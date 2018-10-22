<?php
class PostDataBean{

    private $p_id;
    private $u_id;
    private $u_nickname;
    private $p_date;
    private $p_title;
    private $p_text;
    private $p_nice;
    private $p_delete;
    private $commentList = array();

    /**
     * @return multitype:
     */
    public function getCommentList()
    {
        return $this->commentList;
    }

    /**
     * @param multitype: $commentList
     */
    public function setCommentList($commentList)
    {
        $this->commentList = $commentList;
    }

    /**
     * @return mixed
     */
    public function getP_id()
    {
        return $this->p_id;
    }

    /**
     * @return mixed
     */
    public function getU_id()
    {
        return $this->u_id;
    }

    /**
     * @return mixed
     */
    public function getU_nickname()
    {
        return $this->u_nickname;
    }

    /**
     * @return mixed
     */
    public function getP_date()
    {
        return $this->p_date;
    }

    /**
     * @return mixed
     */
    public function getP_title()
    {
        return $this->p_title;
    }

    /**
     * @return mixed
     */
    public function getP_text()
    {
        return $this->p_text;
    }

    /**
     * @return mixed
     */
    public function getP_nice()
    {
        return $this->p_nice;
    }

    /**
     * @return mixed
     */
    public function getP_delete()
    {
        return $this->p_delete;
    }

    /**
     * @param mixed $p_id
     */
    public function setP_id($p_id)
    {
        $this->p_id = $p_id;
    }

    /**
     * @param mixed $u_id
     */
    public function setU_id($u_id)
    {
        $this->u_id = $u_id;
    }

    /**
     * @param mixed $u_nickname
     */
    public function setU_nickname($u_nickname)
    {
        $this->u_nickname = $u_nickname;
    }

    /**
     * @param mixed $p_date
     */
    public function setP_date($p_date)
    {
        $this->p_date = $p_date;
    }

    /**
     * @param mixed $p_title
     */
    public function setP_title($p_title)
    {
        $this->p_title = $p_title;
    }

    /**
     * @param mixed $p_text
     */
    public function setP_text($p_text)
    {
        $this->p_text = $p_text;
    }

    /**
     * @param mixed $p_nice
     */
    public function setP_nice($p_nice)
    {
        $this->p_nice = $p_nice;
    }

    /**
     * @param mixed $p_delete
     */
    public function setP_delete($p_delete)
    {
        $this->p_delete = $p_delete;
    }

}