<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = ['name','phone','male','nam_sinh','email','thongtin_congtrinh','goi_dich_vu','hang_muc','phong_cach','hang_muc_khac','dien_tich_dat','dientich_xaydung','so_tang','hang_muc_dau_tu','ngay_khoi_cong','ngay_hoan_thanh','mau_thich','mau_khongthich','lat_san','van_san','da_tu_nhien','op_tuong','op_tran','vach_ngan','thiet_bi_ve_sinh','cua','thiet_bi_dien','den_chieu_sang','son_va_chong_tham','noi_that','van_phong_tu_van','status'];

}
