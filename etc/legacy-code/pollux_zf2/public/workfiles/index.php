<?php include 'inc/htmlHeader.phtml'; ?>
<div id="wfOverview">
	<h1>Übersicht</h1>

	<h2>Allgemein</h2>
	<ul>
		<li><a href="layout.phtml">Layout & Navigation</a></li>
		<li><a href="suggestion-widget.phtml">Vorschlagswidget</a></li>
	</ul>

	<h2>Übersichten</h2>
	<ul>
		<li><a href="movies.phtml">Filme</a></li>
		<li><a href="movie-detail.phtml">Film Detailansicht (Layer)</a></li>
		<li><a href="books.phtml">Bücher</a></li>
		<li><a href="wishlist.phtml">Wunschliste</a></li>
	</ul>

	<h2 class="wfOverview">Adminbereich</h2>
	<ul class="wfOverview">
		<li><a href="edit-movie.phtml">Film hinzufügen/bearbeiten</a>
		<li><a href="edit-book.phtml">Buch hinzufügen/bearbeiten</a>
		<li><a href="edit-person.phtml">Person hinzufügen/bearbeiten</a></li>
		<li><a href="add-mediumtype.phtml">Medientyp hinzufügen/bearbeiten</a></li>
	</ul>
</div>
<?php include 'inc/htmlFooter.phtml'; ?>
