<?php
// Bài 1
interface PhepTinh {
    function Tong() ;    
    function Hieu() ;    
    function Tich() ;    
    function Thuong() ;    
}
class TinhToan implements PhepTinh {
    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    function Tong(){
        return $this->a + $this->b;
    }     
    function Hieu(){
        return $this->a - $this->b;
    }   
    function Tich() {
        return $this->a * $this->b;
    }   
    function Thuong() {
        if ($this->b == 0) {
            return "Số chia phải khác 0";
        }
        return $this->a / $this->b;
    }
}
$tinh = new TinhToan(5,10);
echo $tinh->Tong().'<br>';
echo $tinh->Hieu().'<br>';
echo $tinh->Tich().'<br>';
echo $tinh->Thuong().'<br>';


// Bài 2
class ConNguoi {
    function __construct($ten, $tuoi, $gioi_tinh, $ngay_sinh, $can_nang, $chieu_cao)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->can_nang = $can_nang;
        $this->chieu_cao = $chieu_cao;
    }
}
class VanDongVien extends ConNguoi {
    public $so_huy_chuong, $da_thi_dau = [];
    function __construct($ten, $tuoi, $gioi_tinh, $ngay_sinh, $can_nang, $chieu_cao,$so_huy_chuong, $da_thi_dau)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->can_nang = $can_nang;
        $this->chieu_cao = $chieu_cao;
        $this->so_huy_chuong = $so_huy_chuong;
        $this->da_thi_dau = $da_thi_dau;
    }
    function HienThiThongTin (){
        echo "Tên: $this->ten<br>
        Tuổi: $this->tuoi<br>
        Giới tính: $this->gioi_tinh<br>
        Ngày sinh: $this->ngay_sinh<br>
        Cân nặng: $this->can_nang<br>
        Chiều cao: $this->chieu_cao<br>
        Số huy chương: $this->so_huy_chuong<br>
        Các môn đã thi đấu: " . implode(", ",$this->da_thi_dau)."<br>";        
    }
    function ThiDau($MonThiDau, $huy_chuong) {
        array_push($this->da_thi_dau, $MonThiDau->ten);
        if ($this->can_nang < $MonThiDau->dieu_kien_can_nang || $this->chieu_cao < $MonThiDau->dieu_kien_chieu_cao) {
            echo "Phát hiện nghi vấn hack!";
            if ($this->so_huy_chuong<=$huy_chuong) {
                $this->so_huy_chuong = 0;
            } else {
                $this->so_huy_chuong -= $huy_chuong;
            }            
        }
        return "Số huy chương còn lại: $this->so_huy_chuong <br>";
    }
}
class MonThiDau {    
    function __construct($ten, $dieu_kien_chieu_cao, $dieu_kien_can_nang)
    {
        $this->ten = $ten;
        $this->dieu_kien_chieu_cao = $dieu_kien_chieu_cao;
        $this->dieu_kien_can_nang = $dieu_kien_can_nang;
    }
}

$Quang = new VanDongVien('Quang', 20, 'male', '25/12', 70, 170,9, ['chạy 100m','chạy 200m']);

$chay_500m = new MonThiDau("chạy 500m", 170, 60);
print_r($Quang->ThiDau ($chay_500m,3));

print_r($Quang->HienThiThongTin());
