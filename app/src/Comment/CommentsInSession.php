<?php

namespace Mapomvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentsInSession implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;



    /**
     * Add a new comment.
     *
     * @param array $comment with all details.
     * 
     * @return void
     */
    public function add($comment)
    {
        $comments = $this->session->get('comments', []);
        $comments[] = $comment;
        $this->session->set('comments', $comments);
    }

    /**
     * Update a comment
     * @param $comment
     * @param $id
     * @return void
     */
    public function update($comment, $id)
    {
        $comments = $this->session->get('comments', []);
        $commentsCount = count($comments);
        if($commentsCount > $id) {
            $comments[$id] = $comment;
            $this->session->set('comments', $comments);
        }
    }



    /**
     * Find and return all comments.
     *
     * @return array with all comments.
     */
    public function findAll()
    {
        return $this->session->get('comments', []);
    }



    /**
     * Delete all comments.
     *
     * @return void
     */
    public function deleteAll()
    {
        $this->session->set('comments', []);
    }


    /**
     * find one comment.
     * @param $id
     * @return null
     */
    public function findOne($id){
        $comments = $this->session->get('comments', []);
        $comment = null;
        $commentsCount = count($comments);

        if($commentsCount > $id) {
            $c = $comments[$id];
            if ($c != null) {
                $comment = $c;
            }
        }

        return $comment;
    }

    /**
     * Delete one comment, void
     * @param $id
     */
    public function deleteOne($id){
        $comments = $this->session->get('comments', []);
        $comment = null;
        $commentsCount = count($comments);

        if($commentsCount > $id) {
            unset($comments[$id]);
        }

        $this->session->set('comments', $comments);
    }

}
