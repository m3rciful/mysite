<?php
class Bank{
    private $id;
    private $eban;
    private $bankname;

    public function __construct($args,$flag)
    {
        $repo=new BankRepository();
        switch ($flag) {
            case 'READ':{
                $bank=$repo->readBank($args);
                $this->_setId($bank["id"]);
                $this->_setEban($bank["eban"]);
                $this->_setBankname($bank["bankname"]);
                break;
            }
            case 'INSERT':{
                $this->_setId($repo->insertBank($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateBank($args);
                break;
            }
            case 'DELETE':{
                $repo->deleteBank($args);
                break;
            }
        }
    }
    private function readBank($id){
        $sql="SELECT `id`, `eban`, `bankname` FROM `bank` WHERE id=?";
                $dbh = ConnDB::getDbh();
                $stmt=$dbh->prepare($sql);
                $stmt->execute(["$id"]);//выполняем запрос с подстановкой значения переменной $id в ?
                $row = $stmt->fetch();// записываем выборку в массив php
                // инициируем состояние класса Group
                $this->_setId($row["id"]);
                $this->_setEban($row["eban"]);
                $this->_setBankname($row["bankname"]);
    }

    private function insertBank($args){
        foreach ($args as $key => $value) {
            if (""==$value) {
                throw new Exception("Некорректно введены данные!");
                return;
            }
        }
                $sql="INSERT INTO `bank`(`eban`, `bankname`) VALUES (?,?)";
                $stmt = ConnDB::getDbh()->prepare($sql);
                $stmt->execute(array_values($args));// выполняет запрос
                $this->setId(ConnDB::getDbh()->lastInsertId());//устанавливает значение id вставленной строки
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of eban.
     *
     * @return mixed
     */
    public function getEban()
    {
        return $this->eban;
    }

    /**
     * Sets the value of eban.
     *
     * @param mixed $eban the eban
     *
     * @return self
     */
    private function _setEban($eban)
    {
        $this->eban = $eban;

        return $this;
    }

    /**
     * Gets the value of bankname.
     *
     * @return mixed
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Sets the value of bankname.
     *
     * @param mixed $bankname the bankname
     *
     * @return self
     */
    private function _setBankname($bankname)
    {
        $this->bankname = $bankname;

        return $this;
    }
}