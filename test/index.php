
	<?php
	include 'header.php'; 
	 
	$db = new PDO("mysql:host=localhost;dbname=student", 'root', 'root');
	$sql = "SELECT * FROM news ORDER BY `date` DESC LIMIT 1";
	$res = $db->query($sql);
	$row = $res->fetch();
	?>


	<section class="main-news" style="background: url(img/'<?=strip_tags($row['image'])?>') no-repeat center;">
		<div class="main-news-wrapper center">
			<h1 class="main-news--h1"><?=$row['title']?></h1>

			<h2 class="main-news--h2"><?=strip_tags($row['announce'])?></h2>
		</div>
	</section>

	<main class="center news">
		<h3 class="news-title">Новости</h3>

<?php
	$sql = "SELECT *, DATE_FORMAT(`date`, '%d.%m.%Y') as dateformated FROM news ORDER BY `date` DESC LIMIT 4";
	$res = $db->query($sql);
?>

<!-- Исправлено -->
		<div class="news--item-wrapper">

		<?php
		foreach($res->fetchAll() as $row){
		?>
			<a href="news.php?id=<?=$row['id']?>" class="news--item">
				<p class="news-item-time"><?=$row['dateformated']?></p>
				<p class="news--item-title"><?=strip_tags($row['title'])?></p>
				<p class="news--item-text"><?=strip_tags($row['announce'])?></p>
				<div class="news--item-btn"> Подробнее
					<svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#841844" />
					</svg>
				</div>
			</a>
		<?php
		}
		?>
		</div>
	</main>

	<!-- <form class="test">
	<input type="hidden" value="Ага, вот эти ребята" name="hiddnen-field" />
	</form> -->


	<div class="center feedback-form__container">
        <form class="center feedback-form">
			<!-- <input type="hidden" value="Ага, вот эти ребята" name="hiddnen-field" /> -->
            <div class="feedback-form__group">
                <input type="text" name="name" class="feedback-form__name" placeholder="Введите имя">
            </div>
            <div class="feedback-form__group">
                <input type="email" name="email" class="feedback-form__email" placeholder="Введите email">
            </div>
            <div class="feedback-form__group">
                <input type="text" name="message" class="feedback-form__text" placeholder="Введите сообщение">
            </div>
            <input type="submit" value="Отправить" class="feedback-form__submit">
        </form>
        <p class="feedback-msg not-visible">Спасибо за ваше сообщение!</p>
    </div>


	<nav class="prefooter-nav center">
		<ul class="prefooter-nav-list">
			<li class="prefooter-nav-list__element"><a href="#" class="prefooter-nav-list__element-link prefooter-nav-list__element-link-active">1</a></li>
			<li class="prefooter-nav-list__element"><a href="#" class="prefooter-nav-list__element-link">2</a></li>
			<li class="prefooter-nav-list__element"><a href="#" class="prefooter-nav-list__element-link">3</a></li>
			<li class="prefooter-nav-list__element"><a href="#" class="prefooter-nav-list__element-link next-arrow">
					<svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#841844" />
					</svg>
				</a></li>
		</ul>
	</nav>

	<?php include 'footer.php'; ?>
