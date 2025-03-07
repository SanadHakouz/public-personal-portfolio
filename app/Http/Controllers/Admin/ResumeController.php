<?

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::latest()->get();
        return view('admin.resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('admin.resumes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cv_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('cv_file')->store('resumes', 'public');

        $resume = Resume::create([
            'title' => $request->title,
            'file_path' => $path,
            'is_active' => $request->has('is_active'),
        ]);

        // If this is the active resume, deactivate all others
        if ($request->has('is_active')) {
            Resume::where('id', '!=', $resume->id)
                  ->update(['is_active' => false]);
        }

        return redirect()->route('admin.resumes.index')
                         ->with('success', 'Resume uploaded successfully');
    }

    public function edit(Resume $resume)
    {
        return view('admin.resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('cv_file')) {
            // Delete old file
            if (Storage::disk('public')->exists($resume->file_path)) {
                Storage::disk('public')->delete($resume->file_path);
            }

            // Store new file
            $data['file_path'] = $request->file('cv_file')->store('resumes', 'public');
        }

        $resume->update($data);

        // If this is the active resume, deactivate all others
        if ($request->has('is_active')) {
            Resume::where('id', '!=', $resume->id)
                  ->update(['is_active' => false]);
        }

        return redirect()->route('admin.resumes.index')
                         ->with('success', 'Resume updated successfully');
    }

    public function destroy(Resume $resume)
    {
        // Delete file
        if (Storage::disk('public')->exists($resume->file_path)) {
            Storage::disk('public')->delete($resume->file_path);
        }

        $resume->delete();

        return redirect()->route('admin.resumes.index')
                         ->with('success', 'Resume deleted successfully');
    }
}
