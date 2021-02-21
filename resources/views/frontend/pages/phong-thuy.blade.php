@extends('frontend.master')
@section('main')
   <link rel="stylesheet" type="text/css" href="{{ __BASE_URL__ }}/css/thuocloban.css" />

   <?php 
      if(!empty($dataSeo)){
         $content = json_decode($dataSeo->content);
      }
      $namsinh = request()->namsinh ? request()->namsinh : ''; 
      $male = request()->male ? request()->male : 555; 
      $huongnha = request()->huongnha ? request()->huongnha : 555; 
   ?>
   
   <main id="main" class="main-site main-page main-phong-thuy-ket-qua">
      @include('frontend.teamplate.banner')
      <div class="main-container">
         <div class="main-content">
            <article class="lth-posts">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="posts-box">
                           <div class="title-box">
                              <div class="tab-phong-thuy">
                                 <ul class="title-tab">
                                    <li>
                                       <a class="active">Phong thủy</a>
                                    </li>
                                    <li>
                                       <a href="{{route('home.thuoc-lo-ban')}}">Thước lỗ ban</a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="content-box content-tab">
                              <div class="tab-phong-thuy">
                                 <form action="" method="get">
                                    <div class="form-content groups-box">
                                       <!-- <div class="form-group">
                                          <input type="text" name="" placeholder="Nhập thông tin xem phong thủy" class="form-control">
                                          </div> -->
                                       <div class="form-group">
                                          <input type="number" name="namsinh" placeholder="Năm sinh" class="form-control" value="{{@$namsinh}}">
                                       </div>
                                       <div class="form-group">
                                          <select class="form-control" name="male">
                                             <option value="-1" @if($male==-1) selected @endif>-- Giới tính --</option> 
                                             <option value="1" @if($male==1) selected @endif>Nam giới</option> 
                                             <option value="0" @if($male==0) selected @endif>Nữ giới</option>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <select class="form-control" name="huongnha">
                                             <option value="-1" @if($huongnha==-1) selected @endif>-- Hướng nhà --</option> 
                                             <option value="0" @if($huongnha==0) selected @endif>Nam</option> 
                                             <option value="1" @if($huongnha==1) selected @endif>Tây Nam</option> 
                                             <option value="2" @if($huongnha==2) selected @endif>Tây</option> 
                                             <option value="3" @if($huongnha==3) selected @endif>Tây Bắc</option>
                                             <option value="4" @if($huongnha==4) selected @endif>Bắc</option> 
                                             <option value="5" @if($huongnha==5) selected @endif>Đông Bắc</option> 
                                             <option value="6" @if($huongnha==6) selected @endif>Đông</option> 
                                             <option value="7" @if($huongnha==7) selected @endif>Đông Nam</option> 
                                          </select>
                                       </div>
                                       <div class="form-group form-button">
                                          <button class="btn" title="Ok" type="submit">Ok</button>
                                       </div>
                                    </div>
                                 </form>
                                 @if($html =='')
                                 <div class="phong-thuy-detail-content">
                                    {!! $content->size_board->content1 !!}
                                 </div>
                                 @endif
                                 @if($html !='')
                                 <div class="phong-thuy-detail-content">
                                    <p style="text-align: center; padding: 20px 0;">
                                       <button class="btn" aria-label="Submit">Kết quả</button>
                                   </p>
                                      {!! @$html !!}
                                 </div>
                                 @endif
                                 <div class="tab-content tab-content-2">
                                    Thước lỗ ban
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </article>
         </div>
      </div>
   </main>
   
@endsection