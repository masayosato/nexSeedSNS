<?php

class UserDataBean{

    private $u_id;
    private $u_name;
    private $u_userid;
    private $u_pass;
    private $u_nickname;
    private $u_delete;
    private $u_comment;

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
    public function getU_name()
    {
        return $this->u_name;
    }

    /**
     * @return mixed
     */
    public function getU_userid()
    {
        return $this->u_userid;
    }

    /**
     * @return mixed
     */
    public function getU_pass()
    {
        return $this->u_pass;
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
    public function getU_delete()
    {
        return $this->u_delete;
    }

    /**
     * @param mixed $u_id
     */
    public function setU_id($u_id)
    {
        $this->u_id = $u_id;
    }

    /**
     * @param mixed $u_name
     */
    public function setU_name($u_name)
    {
        $this->u_name = $u_name;
    }

    /**
     * @param mixed $u_userid
     */
    public function setU_userid($u_userid)
    {
        $this->u_userid = $u_userid;
    }

    /**
     * @param mixed $u_pass
     */
    public function setU_pass($u_pass)
    {
        $this->u_pass = $u_pass;
    }

    /**
     * @param mixed $u_nickname
     */
    public function setU_nickname($u_nickname)
    {
        $this->u_nickname = $u_nickname;
    }

    /**
     * @param mixed $u_delete
     */
    public function setU_delete($u_delete)
    {
        $this->u_delete = $u_delete;
    }
    /**
     * @return mixed
     */
    public function getU_comment()
    {
        return $this->u_comment;
    }

    /**
     * @param mixed $u_comment
     */
    public function setU_comment($u_comment)
    {
        $this->u_comment = $u_comment;
    }

}

?>