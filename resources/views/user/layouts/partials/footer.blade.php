<footer class="bg-dark text-white pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Về chúng tôi</h5>
          <p>Chúng tôi là cổng thông tin hàng đầu mang đến cho bạn những tin tức mới nhất từ ​​khắp nơi trên thế giới</p>
        </div>
        <div class="col-md-4">
          <h5>Danh mục</h5>
          <ul class="list-unstyled">
            @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show-loai', $category->id) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Liên hệ</h5>
          <address>
            75 Hồ Tùng Mậu, Mai dịch, Cầu Giấy, Hà Nội<br>
            <a href="mailto:info@newssite.com" class="text-white">tintucmoingay@gmail.com</a><br>
            <a href="tel:+1234567890" class="text-white">+123 456 7890</a>
          </address>
        </div>
      </div>
      
      <hr class="bg-white">
      
      
      <!-- Copyright -->
      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <p>&copy; 2024 Tin tức. Đinh Thị Minh Nguyệt - PH33245</p>
        </div>
      </div>
    </div>
  </footer>

  