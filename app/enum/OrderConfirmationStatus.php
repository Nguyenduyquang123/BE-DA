<?php

namespace App\enum;
enum OrderConfirmationStatus: string
{
    case ChoXacNhan = 'Chờ xác nhận';
    case DangXuLy = 'Đang xử lý';
    case DangGiao = 'Đang giao';
    case DaThanhToan = 'Đã thanh toán';
    case DaGiaoVaThanhToan = 'Đã giao và thanh toán';
    case DaHuy = 'Đã hủy';

    // Dùng cho select dropdown hoặc validation
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}