<?php

function DB($table,$pk='id')   //optional parameter (pk)
{
    return new class($table,$pk) extends mysqli
    {
        private $table,$pk;
        public function __construct($table,$pk)
        {
            parent::__construct('localhost','root','','catering');  //(link to database so that we can perform crud)
            $this->table=$table;     //save the table name 
            $this->pk=$pk;           //save the primary key
        }
        public function save(array|object $data,$id=null)
        {
            $sql="insert into $this->table set ";
            $wh="";
            if($id)
            {
                $sql="update $this->table set ";
                $wh=" where $this->pk=$id";
            }
            foreach($data as $colname=>$value)
            {
                $sql.="$colname='".addslashes($value)."',";
            }
            $sql=substr($sql,0,-1).$wh;
            if($this->query($sql))
            {
                //(update)     (insert)
                return $id??$this->insert_id;
            }
        }

        
      public function get_all($cols="*",$order="")
        {
            if(!$order)
            {
                $order="$this->pk asc";    
            }
            $sql= "select $cols from $this->table order by $order";
            return $this->query($sql)?->fetch_all(MYSQLI_ASSOC);           // (?->)agar query nhi chalti hai to ye ise aage line ko chlne nhi deta                  
        }

        public function filter($filter="",$cols="*",$order="")
        {
            $wh=" where 1 ";
            if(!$order)
            {
                $order="$this->pk asc";    
            }
            if(is_array($filter) && count($filter)>0)
            {
                foreach($filter as $c=>$v)
                {
                    $wh.=" and ($c='$v') ";
                }
            }
            $sql= "select $cols from $this->table $wh order by $order";
            return $this->query($sql)?->fetch_all(MYSQLI_ASSOC);           // (?->)agar query nhi chalti hai to ye ise aage line ko chlne nhi deta                  
        }

        public function db_get($sql,$fetch=1)
        {
            if($fetch)
            return $this->query($sql)?->fetch_all(MYSQLI_ASSOC);
            return $this->query($sql)?->fetch_assoc();
        }
         
        public function find($id,$cols="*")
        {
            $sql= "select $cols from $this->table where $this->pk=$id";
            return $this->query($sql)?->fetch_assoc();           // (?->)agar query nhi chalti hai to ye ise aage line ko chlne nhi deta                  
        }

        public function delete($ids)
        {
            $sql= "delete from $this->table where $this->pk in($ids)";
            return $this->query($sql);
        }
        
    };
}

?>