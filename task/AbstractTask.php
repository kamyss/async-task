<?php

namespace Task;

use DB\MedooPDO;

abstract class AbstractTask
{
    protected $DB;//此处应该由server 来分配资源

    /**
     * 在server中可以注入资源
     */
    public function setDB(MedooPDO $db = null)
    {
        $this->DB = $db;
        return;
    }

    /**
     * 业务代码中应实现的具体方法
     * @return mixed
     */
    public abstract function handler();

    /**
     * DB 是否断线
     * @return bool
     */
    public function isDBGone()
    {
        return $this->DB->error()[1] == 2006;
    }
}