<?php    
        
        if(strpos($uri, 'page=') !== false){
                
            $pagenumber = explode('page=', $uri)[1];
            $pagenumber = explode('&', $pagenumber)[0];   
            
            if($pagenumber*5>=$postAmount)
            {
                $nextPageNumber = $pagenumber;
            }
            else
            {
                $nextPageNumber = $pagenumber+1;
            }
            
            if($pagenumber==1)
            {
                $prevPageNumber = $pagenumber;
            }
            else
            {
                $prevPageNumber = $pagenumber-1;
            }        
            
            $uri = explode('blog', $uri)[1];
        
            $hrefPrev = ltrim(str_replace ( 'page='.$pagenumber , 'page='.$prevPageNumber, $uri),'/');   
            $hrefPrev = 'index.php/blog'.$hrefPrev; 
            $hrefNext = ltrim(str_replace ( 'page='.$pagenumber , 'page='.$nextPageNumber, $uri),'/');    
            $hrefNext = 'index.php/blog'.$hrefNext; 
            
        }
        else
        {
            if(strpos($uri, '?')==false)
            {$sign = '?';} 
            else
            {$sign = '&';} 
            
            if(strpos($uri, 'index.php/blog')!=false){
            $uri = explode('blog', $uri)[1];
            $hrefPrev = ltrim($uri,'/').$sign.'page=1';
            $hrefPrev = 'index.php/blog'.$hrefPrev; 
            if($postAmount>5)
            {$hrefNext = ltrim($uri,'/').$sign.'page=2';
            $hrefNext = 'index.php/blog'.$hrefNext;}
            else
            {$hrefNext = $hrefPrev;}
            }
            else {
            $hrefPrev = 'index.php/blog'.$sign.'page=1';
            if($postAmount>5)
            {$hrefNext = 'index.php/blog'.$sign.'page=2';}
            else
            {$hrefNext = $hrefPrev;}
            }
        }
        
        ?>

<div class="row">
    <div class="paging col-md-10 col-md-offset-1">
        <a class="pull-left" href="<?php echo PRE_INDEX_URL.$hrefPrev;?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Previous</a>
        <a class="pull-right" href="<?php echo PRE_INDEX_URL.$hrefNext;?>">Next<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
    </div>
</div>