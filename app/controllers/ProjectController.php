<?php

class ProjectController extends BaseController {

    public function create()
    {
        $project = new Project;
        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'post');
    }

    public function createPost()
    {   
        $project = Project::create(Input::all());
     
        if (Input::hasFile("screenshots")) {
            $files = Input::file("screenshots");
            $rules = array('file' => 'required|mimes:png,gif,jpeg|max:200000');

            foreach ($files as $file) {
                $validator = \Validator::make(array('file'=> $file), $rules);

                $ext = $file->guessClientExtension();
                $filename = $file->getClientOriginalName();

                if($validator->passes()) {
                    $screenshot = new Screenshot;
                    $screenshot->name = $filename;
                    $screenshot->save();
                    $project->screenshots()->save($screenshot);
                    $file->move(public_path('upload'), $filename);
                    // Save the miniature
                    Image::make(public_path('upload').'/'.$filename)->heighten(200)->save(public_path('upload').'/tn-'.$filename);
                }
            }
        }

        return Redirect::to('/chocolat/project/' . $project->id.'/edit')
            ->with('message', 'Nouveau projet créé !');
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'put');
    }

    public function editPut(Project $project)
    {
        $project->update(Input::all());

        if(Input::has('delete_all'))
        {
            foreach($project->screenshots as $screenshot)
            {
                File::delete(public_path('upload').'/'.$screenshot->name);
                File::delete(public_path('upload').'/tn-'.$screenshot->name);
            }
            $project->screenshots()->sync(array());
        }

        if (Input::hasFile("screenshots")) {
            $files = Input::file("screenshots");
            $rules = array('file' => 'required|mimes:png,gif,jpeg|max:200000');

            foreach ($files as $file) {
                $validator = \Validator::make(array('file'=> $file), $rules);

                $ext = $file->guessClientExtension();
                $filename = $file->getClientOriginalName();

                if ($validator->passes()) {
                    $screenshot = new Screenshot;
                    $screenshot->name = $filename;
                    $screenshot->save();
                    $project->screenshots()->save($screenshot);
                    
                    // Save the file
                    $file->move(public_path('upload'), $filename);

                    // Save the miniature
                    Image::make(public_path('upload').'/'.$filename)->heighten(200)->save(public_path('upload').'/tn-'.$filename);
                }
            }
        }


        return Redirect::to('/chocolat/project/' . $project->id)
            ->with('message', 'Projet mis à jour !');
    }

    public function delete(Project $project)
    {
        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'delete');
    }

    public function deletePost(Project $project)
    {
        $project->delete();
        return Redirect::to('/chocolat/projects')
            ->with('message', 'Projet supprimé !');
    }

    public function show(Project $project)
    {
        return View::make('admin.projects.single')
            ->with('project', $project);
    }

    public function index()
    {
        $projects = Project::all();
        return View::make('admin.projects.index')
            ->with('projects', $projects);
    }

    public function showByCategory($name)
    {
        $category = Category::whereName($name)->with('projects')->first();
        return View::make('admin.projects.index')
            ->with('category', $category)
            ->with('projects', $category->projects);
    }

}
