<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Options;
use App\Models\Service;
use DateTime;
use SEO;
use SEOMeta;
use OpenGraph;
use App\Models\Menu;
use Illuminate\Support\Facades\Mail;
use App\Models\Image;
use JsValidator;
use Validator;
use DOMDocument;
use App\Models\Services;
use App\Models\ServicesCategory;
use App\Models\Quotes;
use App\Models\QuotesCategory;
use App\Models\Projects;
use App\Models\ProjectsCategory;
use App\Models\BeautifulHouse;
use App\Models\CategoryBeautifulHouse;
use App\Models\Utilities;
use App\Models\UtilitiesCategory;
use App\Models\Advisory;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\Policy;
use DB;
use Cart;


class IndexController extends Controller
{

	public $config_info;

    public function __construct()
    {
        $site_info = Options::where('type', 'general')->first();
        if ($site_info) {
            $site_info = json_decode($site_info->content);
            $this->config_info = $site_info;

            OpenGraph::setUrl(\URL::current());
            OpenGraph::addProperty('locale', 'vi');
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('author', 'GCO-GROUP');

            SEOMeta::addKeyword($site_info->site_keyword);

            $menuHeader = Menu::where('id_group', 1)->orderBy('position')->get();
            $menuFooter = Menu::where('id_group', 3)->orderBy('position')->get();
            $slider = Image::where('status', 1)->where('type', 'slider')->get();
            $menuCategory = Categories::where('type', 'product_category')->orderBy('order')->get();
            $policy = Policy::where('status', 1)->orderBy('stt','ASC')->get();

            view()->share(compact('site_info', 'menuHeader','slider', 'menuFooter','menuCategory', 'policy'));
        }
    }

    public function createSeo($dataSeo = null)
    {
        $site_info = $this->config_info;
        if (!empty($dataSeo->meta_title)) {
            SEO::setTitle($dataSeo->meta_title);
        } else {
            SEO::setTitle($site_info->site_title);
        }
        if (!empty($dataSeo->meta_description)) {
            SEOMeta::setDescription($dataSeo->meta_description);
            OpenGraph::setDescription($dataSeo->meta_description);
        } else {
            SEOMeta::setDescription($site_info->site_description);
            OpenGraph::setDescription($site_info->site_description);
        }
        if (!empty($dataSeo->image)) {
            OpenGraph::addImage($dataSeo->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($site_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($dataSeo->meta_keyword)) {
            SEOMeta::addKeyword($dataSeo->meta_keyword);
        }
    }

    public function createSeoPost($data)
    {
        if(!empty($data->meta_title)){
            SEO::setTitle($data->meta_title);
        }else {
            SEO::setTitle($data->name);
        }
        if(!empty($data->meta_description)){
            SEOMeta::setDescription($data->meta_description);
            OpenGraph::setDescription($data->meta_description);
        }else {
            SEOMeta::setDescription($this->config_info->site_description);
            OpenGraph::setDescription($this->config_info->site_description);
        }
        if (!empty($data->image)) {
            OpenGraph::addImage($data->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($this->config_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($data->meta_keyword)) {
            SEOMeta::addKeyword($data->meta_keyword);
        }
    }

    public function getHome()
    { 
    	$this->createSeo();

        $contentHome = Pages::where('type', 'home')->first();

        $category = Categories::where('type', 'product_category')->get();

        $services = Services::where([
            'status' => 1,
            'show_home' =>1
        ])->orderBy('created_at','DESC')->take(5)->get();

        $cate_projects = Categories::where('type','category_projects')->get();

        $blogs = Posts::where('status', 1)->orderBy('created_at','DESC')->take(5)->get();

    	return view('frontend.pages.home', compact('contentHome','services','cate_projects','blogs'));
    }

    public function getListAbout(){

        $dataSeo = Pages::where('type', 'about')->first();

        $this->createSeo($dataSeo);

        return view('frontend.pages.about', compact('dataSeo'));
    }

    public function getServices(){

        $dataSeo = Pages::where('type', 'services')->first();

        $this->createSeo($dataSeo);

        $cate_parent = Categories::where([
            'type' => 'category_services',
            'parent_id' => 0,
        ])->get();

        return view('frontend.pages.get-listcategory-services',compact('cate_parent','dataSeo'));

    }

    public function getCategoryServices($slug){

        $cate = Categories::where([
            'slug' => $slug,
            'type' => 'category_services'
        ])->first();

        $cate_child = Categories::where('parent_id',$cate->id)->get();

        if(count($cate_child) > 0){
            return view('frontend.pages.get-childcategory-services',compact('cate','cate_child'));
        }

        $services = $cate->Services;

        return view('frontend.pages.page-service-townhouse',compact('cate','services'));

    }

    public function servicesDetail($slug){

        $data = Services::where('slug',$slug)->first();

        $this->createSeoPost($data);

        $list_category = $data->category->pluck('id')->toArray();

        $list_services_related   = ServicesCategory::whereIn('id_category', $list_category)->get()->pluck('id_services')->toArray();

        $services_same_category  = Services::where('id', '!=', $data->id)->where('status', 1)
                                ->whereIn('id', $list_services_related)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.services-detail',compact('data','services_same_category'));

    }

    public function getQuotes(){

        $data = Quotes::where('status',1)->get();

        return view('frontend.pages.get-quotes',compact('data'));

    }

    public function getChildQuotes($slug){

        $cate = Categories::where('slug',$slug)->first();

        if($cate){

            $data = $cate->Quotes;

            return view('frontend.pages.get-quotes',compact('cate','data'));

        }

        $data = Quotes::where('slug',$slug)->firstOrFail();

        if($data){

            $this->createSeoPost($data);

            $list_category = $data->category->pluck('id')->toArray();

            $list_quotes_related   = QuotesCategory::whereIn('id_category', $list_category)->get()->pluck('id_quotes')->toArray();

            $quotes_same_category  = Quotes::where('id', '!=', $data->id)->where('status', 1)
                                    ->whereIn('id', $list_quotes_related)->orderBy('created_at', 'DESC')->get();

            return view('frontend.pages.quotes-detail',compact('data','quotes_same_category'));

        }
    }

    public function thuocLoBan(){

        $dataSeo = Pages::where('type', 'size_board')->first();

        return view('frontend.pages.size-board',compact('dataSeo'));

    }

    public function curl_get_file_contents($URL) 
    {
            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $URL);
            $contents = curl_exec($c);
            $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
            curl_close($c);
            if ($contents) return $contents;
            else return FALSE;
    }

    public function phongThuy(Request $request){

        $dataSeo = Pages::where('type', 'size_board')->first();

        $this->createSeo($dataSeo);

        if(!$request->has('born') && !$request->has('huongnha') && !$request->has('male')){
            $html = '';
        }else{

            $url = 'https://wonder.vn/xem-phong-thuy/?born=' . $request->namsinh . '&male=' . $request->male . '&huongnha=' . $request->huongnha . '&submitpt=OK';

            $f = $this->curl_get_file_contents($url);
            $dom = new DOMDocument();
            @$dom->loadHTML($f);
            $data = $dom->getElementById("pt-content");
            $div=$dom->getElementById('pt-frmpt');
            if( $div && $div->nodeType==XML_ELEMENT_NODE ){
                $div->parentNode->removeChild( $div );
            }
            $html = $dom->saveHTML($data);

            if(str_contains($html, 'https://cdn.wonder.vn/wp-content/uploads/2016/08/nguhanh.jpg')){

               $html = str_replace("https://cdn.wonder.vn/wp-content/uploads/2016/08/nguhanh.jpg",url('').'/public/frontend/images/ngu-hang-tuong-khac.png',$html);
            }
        }

        //dd($html);

        return view('frontend.pages.phong-thuy',compact('dataSeo','html'));

    }

    public function projectCompleted(){

        $dataSeo = Pages::where('type', 'category_projects')->first();

        $this->createSeo($dataSeo);

        $data = Projects::where('status',1)->orderBy('created_at','DESC')->get();

        return view('frontend.pages.project-completed',compact('dataSeo','data'));

    }

    public function categoryProjectCompleted($slug){

        $dataSeo = Pages::where('type', 'category_projects')->first();

        $this->createSeo($dataSeo);

        $cate = Categories::where([
            'type' => 'category_projects',
            'slug' => $slug
        ])->first();

        $data = $cate->Projects;

        return view('frontend.pages.project-completed',compact('dataSeo','data','cate'));

    }

    public function projectDetail($slug){

        $data = Projects::where('slug',$slug)->first();

        $this->createSeoPost($data);

        $list_category = $data->category->pluck('id')->toArray();

        $list_projects_related   = ProjectsCategory::whereIn('id_category', $list_category)->get()->pluck('id_projects')->toArray();

        $projects_same_category  = Projects::where('id', '!=', $data->id)->where('status', 1)
                                ->whereIn('id', $list_projects_related)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.project-detail',compact('data','projects_same_category'));

    }

    public function beautifulhome(){

        $dataSeo = Pages::where('type', 'category_beautiful_house')->first();

        $this->createSeo($dataSeo);

        $data = BeautifulHouse::where('status',1)->orderBy('created_at','DESC')->get();

        return view('frontend.pages.beautiful-home',compact('dataSeo','data'));

    }

    public function categoryBeautifulHome($slug){

        $dataSeo = Pages::where('type', 'category_beautiful_house')->first();

        $this->createSeo($dataSeo);

        $cate = Categories::where([
            'type' => 'category_beautiful_house',
            'slug' => $slug
        ])->first();

        $data = $cate->BeautifulHouse;

        return view('frontend.pages.beautiful-home',compact('dataSeo','data','cate'));

    }

    public function beautifulHomeDetail($slug){

        $data = BeautifulHouse::where('slug',$slug)->first();

        $this->createSeoPost($data);

        $list_category = $data->category->pluck('id')->toArray();

        $list_beautiful_house_related   = CategoryBeautifulHouse::whereIn('id_category', $list_category)->get()->pluck('id_beautiful_house')->toArray();

        $beautiful_house_same_category  = BeautifulHouse::where('id', '!=', $data->id)->where('status', 1)
                                ->whereIn('id', $list_beautiful_house_related)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.beautiful-house-detail',compact('data','beautiful_house_same_category'));

    }

    public function Utilities(){

        $dataSeo = Pages::where('type', 'category_utilities')->first();

        $this->createSeo($dataSeo);

        $data = Utilities::where('status',1)->orderBy('created_at','DESC')->get();

        return view('frontend.pages.utilities',compact('dataSeo','data'));

    }

    public function categoryUtilities($slug){

        $dataSeo = Pages::where('type', 'category_utilities')->first();

        $this->createSeo($dataSeo);

        $cate = Categories::where([
            'type' => 'category_utilities',
            'slug' => $slug
        ])->first();

        $data = $cate->Utilities;

        return view('frontend.pages.utilities',compact('dataSeo','data','cate'));

    }

    public function utilitiesDetail($slug){

        $data = Utilities::where('slug',$slug)->first();

        $this->createSeoPost($data);

        $list_category = $data->category->pluck('id')->toArray();

        $list_utilities_related   = UtilitiesCategory::whereIn('id_category', $list_category)->get()->pluck('id_utilities')->toArray();

        $utilities_same_category  = Utilities::where('id', '!=', $data->id)->where('status', 1)
                                ->whereIn('id', $list_utilities_related)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.utilities-detail',compact('data','utilities_same_category'));

    }

    public function getContact(){

        $dataSeo = Pages::where('type', 'contact')->first();

        return view('frontend.pages.contact',compact('dataSeo'));

    }

    public function postContact(Request $request){

        $result = [];
        if ($request->name == '' || $request->name == null) {
            $result['message_name'] = 'Bạn chưa nhập họ tên';
        }
        
        if ($request->phone == '' || $request->phone == null) {
            $result['message_phone'] = 'Bạn chưa nhập số điện thoại';
        } else {
            if (!is_numeric($request->phone) || strlen($request->phone) != 10) {
                $result['message_phone'] = 'Vui lòng nhập đúng định dạng số điện thoại. Ví dụ: 0989888456';
            }
        }

        if($result != []){
            return json_encode($result);
        }

        $title = 'Liên hệ từ khách hàng';

        $result['success'] = 'Gửi liên hệ thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn !';

        $input = $request->all();

        $input['status'] = 0;

        $data = Contact::create($input);

        $content_email = [
            'name' => $request->name,
            'phone' => $request->phone,
            'male' => $request->male,
            'nam_sinh' => $request->nam_sinh,
            'thongtin_congtrinh' => $request->thongtin_congtrinh,
            'goi_dich_vu' => $request->goi_dich_vu,
            'hang_muc' => $request->hang_muc,
            'phong_cach' => $request->phong_cach,
            'url' => 'dfsdfd'
        ]; 

        $email_admin = getOptions('general', 'email_admin');

        Mail::send('frontend.mail.mail-contact', $content_email, function ($msg) use($email_admin,$title) {

            $msg->from(config('mail.mail_from'), 'Website - Thọ Quang Phát');

            $msg->to($email_admin, 'Website - Thọ Quang Phát')->subject($title);

        });
        
        return json_encode($result);

    }

    public function signupConsultation(){

        $dataSeo = Pages::where('type', 'advisory')->first();

        return view('frontend.pages.advisory',compact('dataSeo'));

    }

    public function postsignupConsultation(Request $request){

        $result = [];
        if ($request->name == '' || $request->name == null) {
            $result['message_name'] = 'Bạn chưa nhập họ tên';
        }
        
        if ($request->phone == '' || $request->phone == null) {
            $result['message_phone'] = 'Bạn chưa nhập số điện thoại';
        } else {
            if (!is_numeric($request->phone) || strlen($request->phone) != 10) {
                $result['message_phone'] = 'Vui lòng nhập đúng định dạng số điện thoại. Ví dụ: 0989888456';
            }
        }

        if ($request->building_site == '' || $request->building_site == null) {
            $result['building_site'] = 'Trường này không được để trống';
        }

        if ($request->advisory_content == '' || $request->advisory_content == null) {
            $result['advisory_content'] = 'Trường này không được để trống';
        }
        
        if (strlen($request->advisory_content) > 500) {
            $result['advisory_content'] = 'Nội dung không lớn hơn 500 ký tự';
        }
        if($result != []){
            return json_encode($result);
        }

        $title = 'Đăng ký tư vấn từ khách hàng';

        $result['success'] = 'Gửi đăng ký tư vấn thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn !';

        $contact = new Advisory;

        $contact->name = $request->name;

        $contact->phone = $request->phone;

        $contact->building_site = $request->building_site;

        $contact->advisory_content = $request->advisory_content;

        $contact->status = 0;

        $contact->save();

        $content_email = [
            'name' => $request->name,
            'phone' => $request->phone,
            'building_site' => $request->building_site,
            'advisory_content' => $request->advisory_content,
            'url' => route('advisory.edit', $contact->id),
        ]; 

        $email_admin = getOptions('general', 'email_admin');

        Mail::send('frontend.mail.mail-teamplate', $content_email, function ($msg) use($email_admin,$title) {

            $msg->from(config('mail.mail_from'), 'Website - Thọ Quang Phát');

            $msg->to($email_admin, 'Website - Thọ Quang Phát')->subject($title);

        });
        
        return json_encode($result);

    }

    public function getListNews()
    {
        $dataSeo = Pages::where('type', 'news')->first();

        $this->createSeo($dataSeo);

        $data = Posts::where('status', 1)->orderBy('created_at', 'DESC')->paginate(4);

        $post_view = Posts::where('status', 1)->orderBy('view', 'DESC')->paginate(3);

        return view('frontend.pages.archives-news', compact('dataSeo', 'data', 'post_view'));
    }

    public function getSingleNews(Request $request, $slug)
    {
        $dataSeo = Pages::where('type', 'news')->first();

        $data = Posts::where('type', 'blog')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $this->createSeoPost($data);

        $post_same_category = Posts::where('type', 'blog')->where('id','!=',$data->id)->get()->take(4);

        $post_view = Posts::where('status', 1)->orderBy('view', 'DESC')->paginate(3);

        $cookiname = 'view_post_'.$data->id;

        if($request->hasCookie($cookiname) != false){

        }else{

            $view = $data->view+1;

            $data->update(['view'=>$view]);
        }

        $minutes = 180;
        $response = new \Illuminate\Http\Response(view('frontend.pages.single-news', compact('dataSeo', 'data', 'post_view','post_same_category')));

        $response->withCookie(cookie($cookiname, 1, $minutes));

        return $response;

    }

     public function getSearch(Request $request)
    {
        $key = $request->search;

        $dataSeo = Pages::where('type', 'product')->first();

        $this->createSeo($dataSeo);

        SEO::setTitle('Tìm kiếm từ khóa: '.$key);

        $services = Services::where('status',1)
        ->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'DESC')->paginate(6);

        $projects = Projects::where('status',1)
        ->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'DESC')->paginate(6);

        $beautiful_house = BeautifulHouse::where('status',1)
        ->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'DESC')->paginate(6);

        $utilities = Utilities::where('status',1)
        ->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'DESC')->paginate(6);

        // dd($beautiful_house);

        // $products_hot = Products::where([
        //     'status' => 1,
        //     'hot' => 1
        // ])->orderBy('stt')->get()->take(5);

        return view('frontend.pages.search', compact('dataSeo', 'services','projects','beautiful_house','utilities'));
    }

    public function policy($slug){

        $data = Policy::where([
            'slug' =>$slug,
            'status' => 1
        ])->first();

        if($data){
            return view('frontend.pages.policy',compact('data'));
        }

        return false;
    }

}
