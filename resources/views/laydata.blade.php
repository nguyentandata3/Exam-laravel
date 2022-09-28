<form method="POST" action="postlaydata">
    <?php $i = 0; ?>
    @foreach($element_answerquestion as $a) 
        <br><div name='question[$i]'><?php $a ?></div>;
        <?php $i++; ?>
    @endforeach
</form>