<?php
class Product extends BaseModel
{
    protected $table = 'products';

    /**
     * Lấy tất cả sản phẩm cùng với tên danh mục tương ứng.
     */
    public function selectAllWithCategoryName()
    {
        try {
            $sql = "
                SELECT 
                    p.*, 
                    c.category_name 
                FROM 
                    {$this->table} AS p
                INNER JOIN 
                    categories AS c ON p.category_id = c.category_id
                ORDER BY 
                    p.product_id ASC
            ";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Ghi lại lỗi hoặc xử lý một cách phù hợp
            // Ví dụ: error_log($e->getMessage());
            return [];
        }
    }

    /**
     * Tìm một sản phẩm theo ID cùng với tên danh mục.
     * @param int $id ID của sản phẩm
     */
    public function findWithCategoryName($id)
    {
        try {
            $sql = "
                SELECT 
                    p.*, 
                    c.category_name 
                FROM 
                    {$this->table} AS p
                INNER JOIN 
                    categories AS c ON p.category_id = c.category_id
                WHERE 
                    p.product_id = :id
            ";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Lấy danh sách các sản phẩm nổi bật (mới nhất).
     * @param int $limit Số lượng sản phẩm muốn lấy.
     * @return array
     */
    public function getTopSellingProducts($limit = 3)
    {
        // Sử dụng phương thức select() đã được nâng cấp từ BaseModel
        // để lấy các sản phẩm mới nhất một cách đơn giản.
        return $this->select(
            orderBy: 'product_id DESC',
            limit: $limit
        );
    }

    /**
     * Tìm kiếm sản phẩm theo tên, thương hiệu hoặc giá.
     * @param string $keyword Từ khóa tìm kiếm.
     * @return array Danh sách sản phẩm tìm thấy.
     */
    public function searchByNameOrPrice($keyword = '')
    {
        try {
            // Câu SQL cơ bản để tìm kiếm theo tên và thương hiệu
            $sql = "
                SELECT 
                    p.*, 
                    c.category_name 
                FROM 
                    {$this->table} AS p
                INNER JOIN 
                    categories AS c ON p.category_id = c.category_id
                WHERE 
                    p.product_name LIKE :keyword_like
                    OR p.brand LIKE :keyword_like
            ";

            // Nếu từ khóa là một số, mở rộng tìm kiếm để bao gồm cả giá
            // Cải tiến: Tìm kiếm trong một khoảng giá (+/- 20%) để kết quả chính xác hơn
            if (is_numeric($keyword) && $keyword > 0) {
                $sql .= " OR p.price BETWEEN :price_min AND :price_max";
            }

            $sql .= " ORDER BY p.product_id DESC";

            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':keyword_like', '%' . $keyword . '%');

            if (is_numeric($keyword) && $keyword > 0) {
                $price = (float)$keyword;
                $range = $price * 0.20; // Khoảng tìm kiếm là 20%
                $stmt->bindValue(':price_min', $price - $range, PDO::PARAM_STR);
                $stmt->bindValue(':price_max', $price + $range, PDO::PARAM_STR);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log("Search Error: " . $e->getMessage());
            return [];
        }
    }
}
