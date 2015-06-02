<?php

namespace Mapomvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;



    /**
     * View all comments.
     *
     * @return void
     */
    public function viewAction()
    {
        $comments = new \Mapomvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $all = $comments->findAll();

        $validationMessage = new \Mapomvc\Comment\ValidationMessageComment();
        $validationMessage->setDI($this->di);
        $message = $validationMessage->get();

        $this->views->add('comment/comments', [ 'comments' => $all, 'message' => $message ]);
    }

    public function viewOneAction() {

        $action = $this->request->getGet("action");

        $id = $this->request->getGet('id');

        $comments = new \Mapomvc\Comment\CommentsInSession();
        $comments->setDI($this->di);
        $one = null;

        if($id != null){
            $one = $comments->findOne($id);
        }


        if($action == null && $one != null) {
            $data = [
                'mail' => $one["mail"],
                'web' => $one["web"],
                'name' => $one["name"],
                'content' => $one["content"],
                'id' => $id,
                'timestamp' => $one["timestamp"],
                'ip' => $one["ip"],
                'action' => 'view'
            ];

            $this->views->add('comment/comment', $data);
        }
        else if($action === "add") {

            $data = [
                'mail' => null,
                'web' => null,
                'name' => null,
                'content' => null,
                'id' => null,
                'action' => 'add'
            ];

            $this->views->add('comment/form', $data);
        }
        else if($action == "edit" && $one != null && is_numeric($id)) {
                $data = [
                        'mail' => $one["mail"],
                        'web' => $one["web"],
                        'name' => $one["name"],
                        'content' => $one["content"],
                        'id' => $id,
                        'action' => 'edit'
                    ];

                $this->views->add('comment/form', $data);

        }
        else if($one != null && $action == "delete") {
                $data = [
                    'mail' => $one["mail"],
                    'web' => $one["web"],
                    'name' => $one["name"],
                    'content' => $one["content"],
                    'id' => $id,
                    'action' => 'delete'
                ];

                $this->views->add('comment/form', $data);
        }
        else {
                $this->views->add('comment/error404', [ ]);
        }

    }



    /**
     * Add a comment.
     *
     * @return void
     */
    public function addAction()
    {
        $isPosted = $this->request->getPost('doCreate');
        $content = $this->request->getPost('content');
        $name = $this->request->getPost('name');
        $mail = $this->request->getPost('mail');
        $action = $this->request->getPost('action');
        $id = $this->request->getPost('id');

        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }


        $validationMessage = new \Mapomvc\Comment\ValidationMessageComment();
        $validationMessage->setDI($this->di);


        if(strlen(trim($content)) > 2 && strlen(trim($name)) > 2 && strlen(trim($mail)) > 2) {

            $comments = new \Mapomvc\Comment\CommentsInSession();
            $comments->setDI($this->di);

            $validationMessage->clear();

            if($action == "add") {
                $comment = [
                    'content' => $content,
                    'name' => $name,
                    'web' => $this->request->getPost('web'),
                    'mail' => $mail,
                    'timestamp' => time(),
                    'ip' => $this->request->getServer('REMOTE_ADDR'),
                ];

                $comments->add($comment);

            }
            else if($action == "edit" && $id != null && is_numeric($id)){
                $comment = $comments->findOne($id);

                $comment['content'] = $content;
                $comment['name'] = $name;
                $comment['web'] = $this->request->getPost('web');
                $comment['mail'] = $mail;

                $comments->update($comment, $id);
            }
        }
        else {
            $validationMessage->set("You must provide a content, name and mail!");
        }

        $this->response->redirect($this->request->getPost('redirect'));
    }


    public function removeOneAction() {

        $id = $this->request->getPost('id');
        $isPosted = $this->request->getPost('deleteOne');

        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comments = new \Mapomvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->deleteOne($id);

        $this->response->redirect($this->request->getPost('redirect'));
    }


    /**
     * Remove all comments.
     *
     * @return void
     */
    public function removeAllAction()
    {
        $isPosted = $this->request->getPost('doRemoveAll');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comments = new \Mapomvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->deleteAll();

        $validationMessage = new \Mapomvc\Comment\ValidationMessageComment();
        $validationMessage->setDI($this->di);
        $validationMessage->clear();

        $this->response->redirect($this->request->getPost('redirect'));
    }
}
