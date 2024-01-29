<?php

class Output {
    function __construct()
    {
        try {
        } catch (PDOException $e){
        }
    }

    function __destruct()
    {
    }

    public function createTable($result, $act, $id_colum_name = "id",) {
        $tableheader = false;
        $html = "<div style='overflow-x: auto'>";
        // $html .= "<div class='btn'><a href=?act=" . $act . "&op=create>Create new</a></div>";
        $html .= "<table>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($tableheader == false) {
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th class='action-th'>Actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";

            foreach ($row as $key => $value) {
                if ($key == 'product_price') {
                    $str_replace = str_replace('.', ',', $value);
                    $html .= "<td data-title='($key)'>€ {$str_replace}</td>";
                }else {
                    $html .= "<td data-title='($key)'>{$value}</td>";
                }
            }
            $id = isset($row[$id_colum_name]) ? $row[$id_colum_name] : '';
            $html .= "<td class='act-btn'><a href= ?act=" . $act . "&op=read&id=" . $id . "><i class='fa fa-book'></i> Read</a></td>";
            $html .= "<td class='act-btn'><a href= ?act=" . $act . "&op=update&id=" . $id . "><i class='fa fa-edit'></i> Update</a></td>";
            $html .= "<td class='act-btn'><a href= ?act=" . $act . "&op=delete&id=" . $id ."><i class='fa fa-trash'></i> Delete</a></td>";
            $html .= "</tr>";
        }

        $html .= "</table> </div>";
        return $html;
    }

    function createSelect($result){
        $html = "<select>";
        foreach ($result as $row) {
            foreach ($row as $key => $value) {
                $html .= "<option value='{$value}'>{$value}</option>";
            }
        }
        $html .= "</select>";
        return $html;
    }

    function createButtons($pages, $act){
        $pages = 5;
        $html = "";
        for ($i = 1; $i < $pages; $i++){
            $html .= "<div class='page-btns'><a href= ?act=" . $act . "&op=reads&page=" . $i . ">{$i}</a></div>";
        }
        return $html;
    }
}
