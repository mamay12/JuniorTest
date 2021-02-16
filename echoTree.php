<?php

class echoTree
{

    /**
     *@method outTree ($parent_id = NULL, $level = 0, $_categoryArr) is recursive. Sorts an array of all records and builds markup to output the result
     *@param $parent_id int
     *@param $level int. Needed to determine the nesting level
     */

    public function outTree ($parent_id = NULL, $level = 0, $_categoryArr) {
        if(isset($_categoryArr[$parent_id])){
            foreach ($_categoryArr[$parent_id] as $value) {
                echo "<div class = 'text' style='margin-left:" . ($level * 25) . "px;'><div class='sub-text' id ='" . $value->id . "'>" . $value->name . "</div><button class = 'add' id=". $value->id . ">+</button><button class = 'delete' id=" . $value->id . ">-</button></div>";
                $level++;
                $this->outTree($value->id, $level, $_categoryArr);
                $level--;
            }

        }
    }
}