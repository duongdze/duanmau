-- Lệnh này được dùng để tạo một cơ sở dữ liệu (database) mới nếu nó chưa tồn tại.
-- `web_ban_giay` là tên của cơ sở dữ liệu.
-- IF NOT EXISTS là tùy chọn đảm bảo lệnh này không gây lỗi nếu database đã tồn tại.
-- Bạn có thể bỏ qua lệnh này nếu đã có database và chỉ muốn tạo bảng trong đó.
-- CREATE DATABASE IF NOT EXISTS `web_ban_giay`;

-- Lệnh này dùng để chọn cơ sở dữ liệu mà bạn muốn thực hiện các thao tác (như tạo bảng) trên đó.
-- Bạn phải chạy lệnh này (hoặc chọn database qua giao diện của công cụ quản lý) trước khi tạo bảng.
-- USE `web_ban_giay`;

-- -----------------------------------------------------------------------------
-- Bảng: Categories (Danh mục sản phẩm)
-- Mục đích: Lưu trữ các danh mục sản phẩm, ví dụ: "Giày thể thao", "Giày cao gót", "Dép"...
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Categories` (
    `category_id` INT AUTO_INCREMENT PRIMARY KEY, -- Cột ID danh mục, số nguyên, tự động tăng, là khóa chính (duy nhất và không rỗng).
    `category_name` VARCHAR(100) NOT NULL UNIQUE, -- Tên danh mục, chuỗi tối đa 100 ký tự, không được rỗng, phải là duy nhất.
    `description` TEXT,                            -- Mô tả chi tiết về danh mục, có thể là văn bản dài.
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Thời gian tạo danh mục, tự động ghi nhận thời điểm tạo.
);

-- -----------------------------------------------------------------------------
-- Bảng: Products (Sản phẩm)
-- Mục đích: Lưu trữ thông tin chi tiết của từng loại giày.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Products` (
    `product_id` INT AUTO_INCREMENT PRIMARY KEY,    -- Cột ID sản phẩm, số nguyên, tự động tăng, là khóa chính.
    `category_id` INT NOT NULL,                     -- Cột ID danh mục mà sản phẩm thuộc về, số nguyên, không được rỗng.
                                                    -- Đây sẽ là khóa ngoại liên kết với bảng Categories.
    `product_name` VARCHAR(255) NOT NULL,           -- Tên sản phẩm, chuỗi tối đa 255 ký tự, không được rỗng.
    `description` TEXT,                             -- Mô tả chi tiết về sản phẩm, có thể là văn bản dài.
    `price` DECIMAL(10, 2) NOT NULL,                -- Giá của sản phẩm, kiểu số thập phân với 10 chữ số tổng cộng và 2 chữ số sau dấu phẩy, không được rỗng.
    `stock_quantity` INT NOT NULL DEFAULT 0,        -- Số lượng sản phẩm tồn kho, số nguyên, không được rỗng, mặc định là 0.
    `image_url` VARCHAR(255),                       -- URL đến hình ảnh của sản phẩm, chuỗi tối đa 255 ký tự, có thể rỗng (NULL).
    `brand` VARCHAR(100),                           -- Thương hiệu của sản phẩm, chuỗi tối đa 100 ký tự.
    `color` VARCHAR(50),                            -- Màu sắc của sản phẩm, chuỗi tối đa 50 ký tự.
    `size` VARCHAR(20),                             -- Kích thước giày (ví dụ: 40, 41, 38.5), chuỗi tối đa 20 ký tự.
    `material` VARCHAR(100),                        -- Chất liệu sản phẩm, chuỗi tối đa 100 ký tự.
    `status` ENUM('available', 'out_of_stock', 'inactive') DEFAULT 'available', -- Trạng thái của sản phẩm, chỉ chấp nhận các giá trị 'available', 'out_of_stock', 'inactive', mặc định là 'available'.
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian tạo sản phẩm, tự động ghi nhận thời điểm tạo.
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Thời gian cập nhật sản phẩm, tự động cập nhật mỗi khi dòng dữ liệu thay đổi.
    FOREIGN KEY (`category_id`) REFERENCES `Categories`(`category_id`) -- Định nghĩa khóa ngoại: cột `category_id` trong bảng `Products` tham chiếu đến cột `category_id` trong bảng `Categories`.
);

-- -----------------------------------------------------------------------------
-- Bảng: Users (Người dùng)
-- Mục đích: Lưu trữ thông tin khách hàng và quản trị viên.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,       -- Cột ID người dùng, số nguyên, tự động tăng, là khóa chính.
    `username` VARCHAR(50) NOT NULL UNIQUE,         -- Tên đăng nhập, chuỗi tối đa 50 ký tự, không được rỗng, phải là duy nhất.
    `password_hash` VARCHAR(255) NOT NULL,          -- Mật khẩu đã mã hóa (hashed password), chuỗi tối đa 255 ký tự, không được rỗng.
                                                    -- TUYỆT ĐỐI không lưu mật khẩu dưới dạng văn bản thuần!
    `email` VARCHAR(100) NOT NULL UNIQUE,           -- Địa chỉ email, chuỗi tối đa 100 ký tự, không được rỗng, phải là duy nhất.
    `full_name` VARCHAR(255),                       -- Họ và tên đầy đủ, chuỗi tối đa 255 ký tự.
    `phone_number` VARCHAR(20),                     -- Số điện thoại, chuỗi tối đa 20 ký tự.
    `address` TEXT,                                 -- Địa chỉ, có thể là văn bản dài.
    `user_type` ENUM('customer', 'admin') DEFAULT 'customer', -- Loại tài khoản: 'customer' (khách hàng) hoặc 'admin' (quản trị viên), mặc định là 'customer'.
    `registration_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian đăng ký tài khoản, tự động ghi nhận thời điểm tạo.
    `last_login` TIMESTAMP NULL                     -- Thời gian đăng nhập gần nhất, có thể rỗng (NULL) nếu chưa bao giờ đăng nhập.
);

-- -----------------------------------------------------------------------------
-- Bảng: Orders (Đơn hàng)
-- Mục đích: Lưu trữ thông tin tổng quan về mỗi đơn hàng.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Orders` (
    `order_id` INT AUTO_INCREMENT PRIMARY KEY,      -- Cột ID đơn hàng, số nguyên, tự động tăng, là khóa chính.
    `user_id` INT NOT NULL,                         -- Cột ID người dùng đặt hàng, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Users.
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian đặt hàng, tự động ghi nhận thời điểm tạo.
    `total_amount` DECIMAL(10, 2) NOT NULL,         -- Tổng số tiền của đơn hàng, số thập phân, không được rỗng.
    `status` ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled', 'returned') DEFAULT 'pending', -- Trạng thái của đơn hàng, mặc định là 'pending'.
    `shipping_address` TEXT,                        -- Địa chỉ giao hàng chi tiết.
    `payment_method` VARCHAR(50),                   -- Phương thức thanh toán (ví dụ: 'COD', 'Bank Transfer', 'PayPal').
    `payment_status` ENUM('pending', 'paid', 'failed') DEFAULT 'pending', -- Trạng thái thanh toán của đơn hàng.
    `notes` TEXT,                                   -- Ghi chú thêm cho đơn hàng.
    FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) -- Định nghĩa khóa ngoại: cột `user_id` trong bảng `Orders` tham chiếu đến cột `user_id` trong bảng `Users`.
);

-- -----------------------------------------------------------------------------
-- Bảng: Order_Items (Chi tiết đơn hàng)
-- Mục đích: Lưu trữ các sản phẩm cụ thể và số lượng của chúng trong mỗi đơn hàng.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Order_Items` (
    `order_item_id` INT AUTO_INCREMENT PRIMARY KEY, -- Cột ID chi tiết đơn hàng, số nguyên, tự động tăng, là khóa chính.
    `order_id` INT NOT NULL,                        -- Cột ID đơn hàng mà item này thuộc về, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Orders.
    `product_id` INT NOT NULL,                      -- Cột ID sản phẩm, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Products.
    `quantity` INT NOT NULL,                        -- Số lượng của sản phẩm này trong đơn hàng, số nguyên, không được rỗng.
    `price_at_order` DECIMAL(10, 2) NOT NULL,       -- Giá của sản phẩm tại thời điểm đặt hàng (quan trọng vì giá có thể thay đổi).
    FOREIGN KEY (`order_id`) REFERENCES `Orders`(`order_id`), -- Khóa ngoại tham chiếu đến bảng Orders.
    FOREIGN KEY (`product_id`) REFERENCES `Products`(`product_id`) -- Khóa ngoại tham chiếu đến bảng Products.
);

-- -----------------------------------------------------------------------------
-- Bảng: Carts (Giỏ hàng)
-- Mục đích: Lưu trữ thông tin giỏ hàng của từng người dùng đã đăng nhập.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Carts` (
    `cart_id` INT AUTO_INCREMENT PRIMARY KEY,       -- Cột ID giỏ hàng, số nguyên, tự động tăng, là khóa chính.
    `user_id` INT NOT NULL UNIQUE,                  -- Cột ID người dùng sở hữu giỏ hàng này, số nguyên, không được rỗng, phải là duy nhất (mỗi người dùng 1 giỏ).
                                                    -- Khóa ngoại liên kết với bảng Users.
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian tạo giỏ hàng.
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Thời gian cập nhật giỏ hàng gần nhất.
    FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) -- Khóa ngoại tham chiếu đến bảng Users.
);

-- -----------------------------------------------------------------------------
-- Bảng: Cart_Items (Chi tiết giỏ hàng)
-- Mục đích: Lưu trữ các sản phẩm và số lượng trong mỗi giỏ hàng.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cart_Items` (
    `cart_item_id` INT AUTO_INCREMENT PRIMARY KEY,  -- Cột ID chi tiết giỏ hàng, số nguyên, tự động tăng, là khóa chính.
    `cart_id` INT NOT NULL,                         -- Cột ID giỏ hàng mà item này thuộc về, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Carts.
    `product_id` INT NOT NULL,                      -- Cột ID sản phẩm, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Products.
    `quantity` INT NOT NULL,                        -- Số lượng của sản phẩm này trong giỏ hàng, số nguyên, không được rỗng.
    FOREIGN KEY (`cart_id`) REFERENCES `Carts`(`cart_id`), -- Khóa ngoại tham chiếu đến bảng Carts.
    FOREIGN KEY (`product_id`) REFERENCES `Products`(`product_id`), -- Khóa ngoại tham chiếu đến bảng Products.
    UNIQUE (`cart_id`, `product_id`)                -- Ràng buộc duy nhất: đảm bảo mỗi sản phẩm chỉ xuất hiện một lần trong mỗi giỏ hàng.
);

-- -----------------------------------------------------------------------------
-- Bảng: Reviews (Đánh giá sản phẩm)
-- Mục đích: Lưu trữ các đánh giá và xếp hạng của người dùng về sản phẩm.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Reviews` (
    `review_id` INT AUTO_INCREMENT PRIMARY KEY,     -- Cột ID đánh giá, số nguyên, tự động tăng, là khóa chính.
    `product_id` INT NOT NULL,                      -- Cột ID sản phẩm được đánh giá, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Products.
    `user_id` INT NOT NULL,                         -- Cột ID người dùng thực hiện đánh giá, số nguyên, không được rỗng.
                                                    -- Khóa ngoại liên kết với bảng Users.
    `rating` INT NOT NULL CHECK (`rating` >= 1 AND `rating` <= 5), -- Điểm đánh giá (từ 1 đến 5 sao), số nguyên, không được rỗng, có ràng buộc kiểm tra giá trị.
    `comment` TEXT,                                 -- Bình luận chi tiết của người dùng.
    `review_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian đánh giá.
    FOREIGN KEY (`product_id`) REFERENCES `Products`(`product_id`), -- Khóa ngoại tham chiếu đến bảng Products.
    FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) -- Khóa ngoại tham chiếu đến bảng Users.
);

-- -----------------------------------------------------------------------------
-- Bảng: Promotions (Khuyến mãi)
-- Mục đích: Lưu trữ thông tin về các chương trình khuyến mãi và mã giảm giá.
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Promotions` (
    `promo_id` INT AUTO_INCREMENT PRIMARY KEY,      -- Cột ID khuyến mãi, số nguyên, tự động tăng, là khóa chính.
    `code` VARCHAR(50) UNIQUE,                      -- Mã khuyến mãi (ví dụ: 'SALE20', 'FREESHIP'), chuỗi tối đa 50 ký tự, phải là duy nhất.
    `discount_type` ENUM('percentage', 'fixed_amount') NOT NULL, -- Loại giảm giá: 'percentage' (theo phần trăm) hoặc 'fixed_amount' (số tiền cố định).
    `discount_value` DECIMAL(10, 2) NOT NULL,       -- Giá trị giảm giá (ví dụ: 10.00 cho 10% hoặc 50000.00 cho 50.000 VNĐ).
    `min_order_amount` DECIMAL(10, 2) DEFAULT 0,    -- Số tiền tối thiểu của đơn hàng để áp dụng khuyến mãi, mặc định là 0.
    `max_discount_amount` DECIMAL(10, 2),           -- Số tiền giảm tối đa (nếu là giảm theo phần trăm, có thể có giới hạn).
    `start_date` DATETIME NOT NULL,                 -- Ngày và giờ bắt đầu khuyến mãi.
    `end_date` DATETIME NOT NULL,                   -- Ngày và giờ kết thúc khuyến mãi.
    `is_active` BOOLEAN DEFAULT TRUE,               -- Trạng thái hoạt động của khuyến mãi (TRUE/FALSE), mặc định là TRUE.
    `applies_to` ENUM('all_products', 'specific_category', 'specific_product') DEFAULT 'all_products', -- Phạm vi áp dụng khuyến mãi.
    `target_id` INT,                                -- ID của danh mục hoặc sản phẩm cụ thể nếu `applies_to` không phải 'all_products'.
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian tạo khuyến mãi.
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Thời gian cập nhật khuyến mãi gần nhất.
);