<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TodoListModel;
use CodeIgniter\API\ResponseTrait;
//http://localhost:8080/TodoListController/view
class TodoListController extends BaseController
{
    use ResponseTrait;

    /**
     * TodoList Model.
     *
     * @var TodoListModel
     */
    protected $todoListModel;

    public function __construct()
    {
        $this->todoListModel = new TodoListModel();
    }

    /**
     * Render todo list view.
     *
     * @return string
     */
    public function view()
    {
        return view('todo');
    }

    /**
     * [GET] /todo/{key}
     *
     * @param integer|null $key
     * @return Response
     */
    public function show(?int $key = null)
    {
        if ($key === null) {
            return $this->failNotFound("Enter the todo key");
        }

        // Find the data from the database.
        $todo = $this->todoListModel->find($key);

        if ($todo === null) {
            return $this->failNotFound("Todo is not found.");
        }

        return $this->respond([
            "msg" => "success",
            "data" => $todo
        ]);
    }

    /**
     * [POST] /todo
     * Create a new todo data into the database.
     *
     * @return Response
     */
    public function create()
    {
        // Get the data from the request.
        $data = $this->request->getJSON();
        $title = $data->title ?? null;
        $content = $data->content ?? null;

        // Check if title and content are present.
        if ($title === null || $content === null) {
            return $this->fail("Required data is not found.", 404);
        }

        // Check if title or content is empty.
        if ($title === "" || $content === "") {
            return $this->fail("Title or content cannot be empty.", 404);
        }

        // Insert data into the database.
        $createdKey = $this->todoListModel->insert([
            "t_title" => $title,
            "t_content" => $content,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        // Check if the insertion was successful.
        if ($createdKey === false) {
            return $this->fail("Create operation failed.");
        } else {
            return $this->respond([
                "msg" => "Create successful."
            ]);
        }
    }

    /**
     * [PUT] /todo/{key}
     *
     * @param integer|null $key
     * @return Response
     */
    public function update(?int $key = null)
    {
        // Get the data from the request.
        $data = $this->request->getJSON();
        $title = $data->title ?? null;
        $content = $data->content ?? null;

        if ($key === null) {
            return $this->failNotFound("Key is not found.");
        }

        // Get the data to be updated.
        $willUpdateData = $this->todoListModel->find($key);

        if ($willUpdateData === null) {
            return $this->failNotFound("This data is not found.");
        }

        if ($title !== null) {
            $willUpdateData["t_title"] = $title;
        }

        if ($content !== null) {
            $willUpdateData["t_content"] = $content;
        }

        // Perform the update action.
        $isUpdated = $this->todoListModel->update($key, $willUpdateData);

        if ($isUpdated === false) {
            return $this->fail("Update failed.");
        } else {
            return $this->respond([
                "msg" => "Update successfully"
            ]);
        }
    }

    /**
     * [DELETE] /todo/{key}
     *
     * @param integer|null $key
     * @return Response
     */
    public function delete(?int $key = null)
    {
        if ($key === null) {
            return $this->failNotFound("Key is not found.");
        }

        // Check if the data exists.
        if ($this->todoListModel->find($key) === null) {
            return $this->failNotFound("This data is not found.");
        }

        // Perform the delete action.
        $isDeleted = $this->todoListModel->delete($key);

        if ($isDeleted === false) {
            return $this->fail("Delete failed.");
        } else {
            return $this->respond([
                "msg" => "Delete successfully"
            ]);
        }
    }
}
