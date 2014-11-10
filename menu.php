<div class="well well-sm" role="complementary">
	<ul class="nav">
		<li>
			<a href="#news" onClick="loadNewDoc('news.php');">News</a>
		</li>
		<li>
			<a href="#agenda" onClick="loadNewDoc('agenda.php');">Agenda</a>
		</li>
		<li>
			<a href="#orga" onClick="loadNewDoc('orga.php');">Organisation</a>
		</li>
	<?php
		if (!(isset($_SESSION["connected"]) && $_SESSION["connected"]))
		{
	?>
			<li>
				<a href="#connect" onClick="loadNewDoc('connect.php');">Connexion</a>
			</li>
	<?php
		}
		else
		{
	?>
		<li>
			<a href="#profil" onClick="loadNewDoc('???????.php);">Profil</a>
		</li>
	<?php
		}
	?>
	</ul>
</div>
