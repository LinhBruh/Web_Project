<div class="home-container">
        <section class="home">
            <form action="index.php?action=timkiem" method="POST">
                <h3>Find your next job</h3>
                <p>Job title <span>*</span></p>
                <input type="text" name="title" placeholder="keyword " required maxlength="20" class="input"> <!--Tìm kiếm theo từ khóa, thể loại công việc, công ty -->
                <p>Job location</p>
                <input type="text" name="location" placeholder="city " required maxlength="50" class="input"> <!--Tìm kiếm theo thành phố,... -->
                <input type="submit" value="Job Search" name="timkiem" class="btn">
            </form>
        </section>
     </div>