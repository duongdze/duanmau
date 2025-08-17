<?php
class Order extends BaseModel{
    protected $table = 'orders';

    /**
     * Lấy tất cả đơn hàng của một người dùng
     * @param int $userID ID của người dùng
     * @return array
     */
    public function findByUserID($userID)
    {
        return $this->select(
            conditions: 'user_id = :user_id',
            params: ['user_id' => $userID],
            orderBy: 'order_date DESC'
        );
    }
}