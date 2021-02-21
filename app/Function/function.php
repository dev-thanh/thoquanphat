<?php

/*use function foo\func;*/

define("__IMAGE_DEFAULT__", asset('public/backend/img/placeholder.png'));
define("__BASE_URL__", url('public/frontend'));

use App\Models\Options;
use Carbon\Carbon;

function renderImage($link)
{
    if (!empty($link)) {
        return $link;
    }
    return asset('public/backend/img/no-image.png');
}

function text_limit($str, $limit = 10)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        if (count($ex_str) > $limit) {
            $str_s = null;
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] .
                    " ";
            }
            return $str_s;
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}

function format_datetime($date,$setting)

{   

    $date_format = Carbon::parse($date);

    return $date_format->format($setting);

}

function menuChildren($data, $id, $item)
{
    if (count($item->get_child_cate()) > 0) {
        echo '<ol class="dd-list">';
        foreach ($item->get_child_cate() as $item) {
            if ($item->parent_id == $id) {
                echo '<li class="dd-item" data-id="' . $item->id . '">';
                echo '  <div class="dd-handle">' . $item->title . '(<i>' . $item->url . '</i>)</div>
                                    <div class="button-group">
                                        <a href="javascript:;" class="modalEditMenu" data-id="' . $item->id . '"> 
                                            <i class="fa fa-pencil fa-fw"></i> Sửa
                                        </a> &nbsp; &nbsp; &nbsp;
                                        <a class="text-danger" href="' . route('setting.menu.delete', $item['id']) . '" onclick="return confirm(\'Bạn có chắc chắn xóa không ?\')" title="Xóa"> <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                                    </div>';
                menuChildren($data, $item->id, $item);
                echo '</li>';
            }
        }
        echo '</ol>';
    }
}

function renderLinkAddPostType()
{
    $type = request()->get('type');
    if ($type == 'blog') {
        return [
            'title'    => 'Bài Viết',
            'linkAdd'  => route('posts.create', ['type' => 'blog']),
            'linkList' => route('posts.index', ['type' => 'blog']),
        ];
    }
}

function listCate($data, $parent_id = 0, $str = '',$type)
{
    foreach ($data as $value) {
        $id   = $value->id;
        $name = $value->name;
        if ($value->parent_id == $parent_id) {
            if ($str == '') {
                $strName = '<b>' . $str . $name . '</b>';
            } else {

                $strName = $str . $name;
            }
            echo '<tr class="odd">';
            echo '<td><input type="checkbox" name="chkItem[]" value="' . $id . '"></td>';
            // echo "<td><img src='$value->image' class='img-responsive imglist'></td>";
            if($type=='category_quotes'){
                echo '<td>
                    <a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa">' . $strName . '</a></br>
                    <a href="' . asset('bao-gia-va-quy-trinh/' . $value->slug) . '" target="_blank"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: ' . asset('bao-gia-va-quy-trinh/' . $value->slug) . ' </a> 
                </td>';
            }

            if($type=='category_services'){
                echo '<td>
                    <a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa">' . $strName . '</a></br>
                    <a href="' . asset('dich-vu/' . $value->slug) . '" target="_blank"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: ' . asset('dich-vu/' . $value->slug) . ' </a> 
                </td>';
            }

            if($type=='category_utilities'){
                echo '<td>
                    <a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa">' . $strName . '</a></br>
                    <a href="' . asset('tien-ich/danh-muc/' . $value->slug) . '" target="_blank"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: ' . asset('tien-ich/danh-muc/' . $value->slug) . ' </a> 
                </td>';
            }

            if($type=='category_projects'){
                echo '<td>
                    <a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa">' . $strName . '</a></br>
                    <a href="' . asset('du-an-hoan-thanh/danh-muc/' . $value->slug) . '" target="_blank"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: ' . asset('du-an-hoan-thanh/danh-muc/' . $value->slug) . ' </a> 
                </td>';
            }

            if($type=='category_beautiful_house'){
                echo '<td>
                    <a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa">' . $strName . '</a></br>
                    <a href="' . asset('mau-nha-dep/danh-muc/' . $value->slug) . '" target="_blank"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: ' . asset('mau-nha-dep/danh-muc/' . $value->slug) . ' </a> 
                </td>';
            }

            echo '<td><a class="text-default" href="' . route('category.edit', $id) . '" title="Sửa"> ' . count($value->get_child_cate()) ?: '_' . ' </a>
                        </td>';
            echo '<td>'. $value->order .'</td>';
            echo ' <td><a href="' . route('category.edit', ['id' => $id,'type' => request()->type]) . '" title="Sửa"> <i class="fa fa-pencil fa-fw"></i> Sửa</a> &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="btn-destroy" data-href="' . route('category.destroy', $id) . '" data-toggle="modal" data-target="#confim">
                                    <i class="fa fa-trash-o fa-fw"></i> Xóa
                                </a>
                            </td>';
            echo '</tr>';

            listCate($data, $id, $str . '---| ',$type);
        }
    }
}

function checkBoxCategory($data, $id, $item, $list_id = null)
{
    if (count($item->get_child_cate()) > 0) {
        echo '<div style="padding-left:15px;">';
        foreach ($item->get_child_cate() as $value) {
            $checked = null;
            if (!empty($list_id)) {
                if (in_array($value->id, $list_id)) {
                    $checked = 'checked';
                }
            }
            if ($value->parent_id == $id) {
                echo '<label class="custom-checkbox">
                            <input type="checkbox" class="category" name="category[]" value="' . $value->id . '" ' . $checked . ' > ' . $value->name . '
                        </label>';
                checkBoxCategory($data, $value->id, $item);
            }
        }
        echo '</div>';
    }
}

function checkBoxCategoryName($data, $id, $item, $list_id = null, $name = null)
{
    if (count($item->get_child_cate()) > 0) {
        echo '<div style="padding-left:15px;">';
        foreach ($item->get_child_cate() as $value) {
            $checked = null;
            if (!empty($list_id)) {
                if (in_array($value->id, $list_id)) {
                    $checked = 'checked';
                }
            }
            if ($value->parent_id == $id) {
                echo '<label class="custom-checkbox">
                            <input type="checkbox" class="category" name="'.$name.'" value="' . $value->id . '" ' . $checked . ' > ' . $value->name . '
                        </label>';
                checkBoxCategory($data, $value->id, $item);
            }
        }
        echo '</div>';
    }
}


function dequy($datas)
{
    $list_ids = [];
    foreach ($datas as $data) {
        $list_ids[] = $data->id;
        if ($data->get_child_cate()->count() > 0) {
            $list_ids = array_merge($list_ids, dequy($data->get_child_cate()));
        }
    }
    return $list_ids;
}

function get_list_ids($datas)
{
    return $datas ? dequy($datas->get_child_cate()) : null;
}

function getlistcate($data, $id)
{
    foreach ($data as $item) {
        if ($item->parent_id == $id) {
            echo '<li class="active"><a href="' . route('home.getActive', ['slug' => $item->slug, 'id' => $item->id]) . '">' . $item->name . '</a></li>';
            getlistcate($data, $item->id);
        }
    }
}

function getListParent($data)
{
    $parent = $data;
    if ($data->parent_id > 0) {
        $parent = $data->getParent();
        $parent = getListParent($parent);
    }
    return $parent;
}

function menuMulti($data, $parent_id = 0, $str = '---| ', $select = 0)
{
    foreach ($data as $value) {
        $id   = $value->id;
        $name = $value->name;
        if ($value->parent_id == $parent_id) {
            if ($select != 0 && $id == $select) {
                echo '<option value=' . $id . ' selected> ' . $str . $value->name . ' </option>';
            } else {
                echo '<option value=' . $id . '> ' . $str . $value->name . ' </option>';
            }
            menuMulti($data, $id, $str . '---|  ', $select);
        }
    }
}
function getOptions($key = null, $field = null)
{
    if(!empty($key)){
        $data = Options::where('type', $key)->first();
        if(!empty($data)){
            $data = json_decode($data->content);
            if(!empty($field)){
                return !empty($data->{ $field }) ? $data->{ $field } : $data;
            }
            return $data;
        }
        return 'key does not exist';
    }
    return 'error';
}


    function renderAction($method)
    {
        return isUpdate($method) ? 'Cập nhật' : 'Thêm mới' ;
    }


    function isUpdate($method)
    {
        return (bool)$method == 'update';
    }

    function updateOrStoreRouteRender($method, $model, $data)
    {
        return isUpdate($method) ? route($model . '.update', $data) : route($model . '.store');
    }

    
    function generateRandomCode() 
    {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1, 5);
    }

    function getConsts() {
        return [
            'sort-trans' => [
                'cu-nhat' => 'Cũ nhất',
                'gia-tu-cao-den-thap' => 'Giá từ cao đến thấp',
                'gia-tu-thap-den-cao' => 'Giá từ thấp đến cao',
            ],
            'sort-attrs' => [
                'cu-nhat' => 'created_at',
                'gia-tu-cao-den-thap' => 'price',
                'gia-tu-thap-den-cao' => 'price',
            ]
        ];
    }

    function getYoutubeEmbedUrl($url)
    {
         $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
         $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
         
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return $youtube_id ;
    }



