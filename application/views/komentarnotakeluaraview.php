<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?=$titel;?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" media="all" href="login_files/stylekomen.css">
<script type="text/javascript" src="login_files/comment-reply.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>

<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>
<body class="page page-id-2 page-template-default single-author singular two-column right-sidebar">
	<form action="komentarnotakeluara?isi=<?=$nonota;?>" method="post" name="commentform" id="commentform">
<div id="page" class="hfeed">
	<div id="main">
		<div id="primary">
			<div id="content" role="main">

				
				
<article id="post-2" class="post-2 page type-page status-publish hentry">
	<header class="entry-header">
		<h1 class="entry-title"><?=$nonota;?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?=$isisurat;?>
	</div><!-- .entry-content -->
</article><!-- #post-2 -->

		<div id="comments">
			
		<ol class="commentlist">
<?=$komenlist;?>			
				

		</ol>

		
	
									<div id="respond">
				<h3 id="reply-title">Beri Komentar<small></small></h3>
									
<p class="comment-form-comment"><label for="comment">Komentar</label><span class="required">*</span><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>						<p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a
 href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; 
&lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del 
datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; 
&lt;strong&gt; </code></p>						<p class="form-submit">
							<input name="btkomen" id="btkomen" value="Kirim Komentar" onClick="simpan()" type="button">
								<input type="hidden" name="hd" id="hd"><input type="hidden" name="urut" id="urut">
						</p>
											
							</div>
		<center><input name="bttutup" id="bttutup" value="Close" onClick="window.close()" type="button"></center>
						
</div><!-- #comments -->

			</div><!-- #content -->
		</div><!-- #primary -->


	</div><!-- #main -->
	<footer id="colophon" role="contentinfo">

			

			
	</footer><!-- #colophon -->
</div><!-- #page -->
<script language="JavaScript" type="text/javascript">
function simpan(){
	if ($F('comment').length<1)
	{
		$('comment').focus();
		alert('Isi Komentar');
	}
	else {
		$('commentform').hd.value="simpran";
		$('commentform').submit();
	}
}
function deli(urut)
{
	if (confirm("Komentar \""+$("komen"+urut).innerHTML+"\" akan di Hapus?"))
	{
		$('commentform').hd.value="deleti";
		$('commentform').urut.value=urut;
		$('commentform').submit();
	}
}
</script>

</form>
</body></html>