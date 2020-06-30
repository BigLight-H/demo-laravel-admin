<?php
/**
 * 写入日志
 * @param $msg
 */
function logMsg($msg) {
    Illuminate\Support\Facades\Log::info($msg);
}
//递归菜单数据
function orgMenuList($menuList, $pid)
{
    $tree = array();                                //每次都声明一个新数组用来放子元素
    foreach ($menuList as $v) {
        if (isset($v['pid']) && $v['pid'] == $pid) {                      //匹配子记录
            $v['children'] = orgMenuList($menuList, $v['id']); //递归获取子记录
            if ($v['children'] == null) {
                unset($v['children']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
            }
            $tree[] = $v;                           //将记录存入新数组
        }
    }
    return $tree;                                  //返回新数组
}
