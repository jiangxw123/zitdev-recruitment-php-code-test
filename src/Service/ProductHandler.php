<?php

namespace App\Service;

class ProductHandler
{

    /**
     * Description: 计算商品列表的总金额
     * @param array $productList 二维数组
     * User: Ash.
     * Date: 2022/7/8 12:10
     * @return int
     */
    public function getTotalPrice(array &$productList){
        $totalPrice = 0;
        foreach ($productList as $item) {
            if(!is_array($item) || !isset($item['price'])) {
                continue;
            }
            $totalPrice += is_numeric($item['price']) ? $item['price'] : 0;
        }
        return $totalPrice;
    }


    /**
     * Description: 针对商品类型的金额排序，并返回对应种类的商品列表
     * @param array $productList
     * @param string $type 商品种类
     * @param string $order 排序顺序 desc:降序 asc:升序
     * User: Ash.
     * Date: 2022/7/8 12:33
     * @return array
     */
    public function sortPriceByType(array &$productList, string $type, $order = 'desc'){
        $ret = [];
        $type = strtolower($type);
        foreach ($productList as $item) {
            if(!is_array($item) || !isset($item['type']) || strtolower($item['type']) != $type) {
                continue;
            }
            $ret[] = $item;
        }
        // 比较函数
        $cmpFuc = function ($item1, $item2) use ($order){
            return $order == 'desc' ? $item1['price'] < $item2['price'] : $item1['price'] >= $item2['price'];
        };
        count($ret) > 1 && usort($ret, $cmpFuc);
        return $ret;
    }


    /**
     * Description: 把日期转换成uninx时间戳
     * @param string $dateTime 日期
     * @param string $timeZone 日期对应的时区，默认是PRC，即东八区
     * User: Ash.
     * Date: 2022/7/9 12:04
     * @return int
     * @throws \Exception
     */
    public function datetimeToTs(string $dateTime, $timeZone = "PRC"){
        return (new \DateTime($dateTime, new \DateTimeZone($timeZone)))->getTimestamp();
    }

}