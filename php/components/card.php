<div class="card">
    <div class="card__face card__face--front">
        <div class="card__face--front--head">
            <div class="card__face--front--head--img">
                <img src="../../img/Its_logo.png" alt="Its Logo">
            </div>
        </div>

        <div class="card__face--front--main">
            <div class="card__face--front--main--img">
                <img src="../../img/img_avatar.png" alt="avatar">
            </div>
            <div class="card__face--front--main--text">
                <ul>
                    <li>
                        <p><b>Surname:</b></p>
                        <p><?php echo $surname ?></p>
                    </li>
                    <li>
                        <p><b>Name:</b></p>
                        <p><?php echo $name ?></p>
                    </li>
                    <li>
                        <p><b>Date of birth:</b></p>
                        <p><?php echo $date ?></p>
                    </li>
                </ul>
            </div>
            <div class="card__face--front--main--text">
                <ul>
                    <li>
                        <p><b>Course:</b></p>
                        <p><?php echo $course ?></p>
                    </li>
                    <li>
                        <p><b>Gender:</b></p>
                        <p><?php echo $gender ?></p>
                    </li>
                    <li>
                        <p><b>Place:</b></p>
                        <p><?php echo $location ?></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card__face--front--foot">
            <div class="card__face--front--foot--buttons">
                <a href="#" class="card__face--front--foot--button card__face--front--foot--button--facebook" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a> 
                <a href="#" class="card__face--front--foot--button card__face--front--foot--button--instagram" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a> 
                <a href="#" class="card__face--front--foot--button card__face--front--foot--button--linkedin" aria-label="Linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a> 
                <a href="#" class="card__face--front--foot--button card__face--front--foot--button--github" aria-label="Linkedin">
                    <i class="fab fa-github"></i>
                </a> 
            </div>
        </div>
    </div>
    <div class="card__face card__face--back">
        <div class="card__face--back--content">
            <img src="../../img/qrcode.png" alt="avatar">
            <img src="../../img/Its_logo.png" alt="avatar">
        </div>
    </div>
</div>