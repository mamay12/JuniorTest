<?php


interface IExecute
{
    public static function delete($data);
    public static function update($data);
    public static function insert($data);
    public static function select();
}