<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Subject;
use App\Models\Test;
/**
 * Class TestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }

    public function store()
    {
        $response =  $this->traitStore();
        $this->handleNewQuestions();
        return $response;
    }

    public function update()
    {
        $response = $this->traitUpdate();
        $this->handleNewQuestions();
        return $response;
    }

    
    /**
     * recreates all test questions to apply edits
     *
     * @return void
     */
    private function handleNewQuestions(){
        $questions = json_decode(request('payload', null), true);
        $id = request('id');

        $test = Test::find($id);

        $test->questions()->delete();

        foreach ($questions as $question)
            $test->questions()->create([
                "type" => $question['type'],
                "test_id" => (int) $id,
                "data" => $question['data']
            ]);
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Test::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/test');
        CRUD::setEntityNameStrings('test', 'tests');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('subject_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');
    }
    

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TestRequest::class);

        /**
         * general tab
         */
        CRUD::field('name')->tab('general');
        CRUD::field('subject_id')
            ->type('select')
            ->entity('subject')
            ->model(Subject::class)
            ->attribute('name')
            ->tab('general');

       /**
        * questions tab
        */
       Crud::field('questions')->type('questions')->tab('questions');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
