<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;  // مدل Role برای دسترسی به نقش‌ها
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('panel.projects.index', compact('projects'));
    }

    public function create()
    {
        // دریافت تمامی نقش‌ها برای نمایش در فرم ایجاد پروژه
        $roles = Role::all();
        return view('panel.projects.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roles' => 'nullable|array',  // نقش‌ها (در صورت وجود) باید به صورت آرایه از ID ها ارسال شوند
            'roles.*' => 'exists:roles,id',  // بررسی اینکه ID ها معتبر باشند
        ]);

        // ذخیره پروژه
        $project = Project::create($request->only('name'));

        // اضافه کردن نقش‌ها به پروژه (در صورت وجود)
        if ($request->has('roles')) {
            $project->roles()->attach($request->roles);  // اتصال نقش‌ها به پروژه
        }

        return redirect()->route('projects.index')->with('success', 'پروژه جدید با موفقیت ایجاد شد!');
    }

    public function show($id)
    {
        $project = Project::with('roles')->findOrFail($id);
        return view('panel.projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::with('roles')->findOrFail($id);
        $roles = Role::all();  // دریافت همه نقش‌ها برای انتخاب در فرم ویرایش
        return view('panel.projects.edit', compact('project', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->only('name'));

        // حذف نقش‌های قبلی
        $project->roles()->detach();

        // اضافه کردن نقش‌های جدید
        if ($request->has('roles')) {
            $project->roles()->attach($request->roles);  // اتصال نقش‌ها به پروژه
        }

        return redirect()->route('projects.index')->with('success', 'پروژه با موفقیت به‌روزرسانی شد!');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'پروژه با موفقیت حذف شد!');
    }
}
