<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";



PrintHead();
PrintCart();
PrintSideMenu();
PrintLittleSearchButton();


?>





    <!-- MENU -->
    <main class="main main-index">
      <aside>
        <span>Categories</span>
        <ul>
          <li><a href="create_account.html">Art</a></li>
          <li><a href="#">Design</a></li>
          <li><a href="#">Photography</a></li>
          <li><a href="#">Architecture</a></li>
          <li><a href="#">Fashion</a></li>
          <li><a href="#">Lifestyle</a></li>
          <li><a href="#" class="all-items">Show All</a></li>
        </ul>
      </aside>
      <!-- SORT BY -->
      <section>
        <div class="section-header">
          <ul>
            <li class="sort-by">
              <a href="#">Sort By ---></a>
              <ul class="sort-items">
                <li><a href="#">Highest Price</a></li>
                <li><a href="#">Lowest Price</a></li>
                <li><a href="#">Alphabet</a></li>
              </ul>
            </li>
          </ul>
          <span href="#" class="amount-items">(8 items)</span>
        </div>
        <!-- CONTENT -->
        <div class="section-body">
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="#">
                  <img src="images/art/ART-1.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">Accidents</div>
              <div class="book-price">€50</div>
              <div class="book-stock">In Stock</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-2.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">The Divided Self</div>
              <div class="book-price">€20</div>
              <div class="book-stock">Sold Out</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-3.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">More Drawings</div>
              <div class="book-price">€40</div>

              <div class="book-stock">In Stock</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-4.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">Construction Workers</div>
              <div class="book-price">€20</div>
              <div class="book-stock">In Stock</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-5.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">Structural Adjustments</div>
              <div class="book-price">€25</div>
              <div class="book-stock">Sold Out</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-6.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">As Slow As Possible</div>
              <div class="book-price">€25</div>
              <div class="book-stock">In Stock</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-7.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">Archives</div>
              <div class="book-price">€20</div>
              <div class="book-stock">In Stock</div>
            </div>
          </div>
          <div class="book-info">
            <div class="book-info-body">
              <div class="book-info-body-text">
                <a class="#" href="">
                  <img src="images/art/ART-8.jpg" alt="bookcover" />
                </a>
                <div class="cart">
                  <a href="#">Add To Cart</a>
                </div>
                <div class="more-info">
                  <a href="detail_book.html">More Info</a>
                </div>
              </div>
            </div>
            <div class="book-info-footer">
              <div class="book-title">The Color of the Flea’s Eye</div>
              <div class="book-price">€80</div>
              <div class="book-stock">In Stock</div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- FOOTER -->
    <footer class="footer">
      <div>
        <h3>Contact</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipiscing elit tempor 
          et incididunt. Labore dolore magna aliqua sed do turpis nunc eget 
          lorem dolor.
        </p>
      </div>
      <div>
        <h3>Payment Methods</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipiscing elit tempor 
          et incididunt. Labore dolore magna aliqua sed do turpis nunc eget 
          lorem dolor.
        </p>
      </div>
      <div>
        <h3>About Us</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipiscing elit tempor 
          et incididunt. Labore dolore magna aliqua sed do turpis nunc eget 
          lorem dolor.
        </p>
      </div>
    </footer>
      <script src="./icons/svgxuse.js"></script>
      <script src="./src/js/sidebar.js"></script>
  </body>
</html>
