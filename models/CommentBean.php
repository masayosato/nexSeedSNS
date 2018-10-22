<?php

class CommentBean{

    private $c_id;
    private $p_id;
    private $u_nickname;
    private $c_data;
    private $c_delete;
    /**
     * @return mixed
     */
    public function getC_id()
    {
        return $this->c_id;
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
    public function getU_nickname()
    {
        return $this->u_nickname;
    }

    /**
     * @return mixed
     */
    public function getC_data()
    {
        return $this->c_data;
    }

    /**
     * @return mixed
     */
    public function getC_delete()
    {
        return $this->c_delete;
    }

    /**
     * @param mixed $c_id
     */
    public function setC_id($c_id)
    {
        $this->c_id = $c_id;
    }

    /**
     * @param mixed $p_id
     */
    public function setP_id($p_id)
    {
        $this->p_id = $p_id;
    }

    /**
     * @param mixed $u_nickname
     */
    public function setU_nickname($u_nickname)
    {
        $this->u_nickname = $u_nickname;
    }

    /**
     * @param mixed $c_data
     */
    public function setC_data($c_data)
    {
        $this->c_data = $c_data;
    }

    /**
     * @param mixed $c_delete
     */
    public function setC_delete($c_delete)
    {
        $this->c_delete = $c_delete;
    }

}


?>