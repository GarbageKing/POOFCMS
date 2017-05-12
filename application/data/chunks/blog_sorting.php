<?php
            
            $uri = $_SERVER['REQUEST_URI']; 
            
            if(strpos($uri, '?') !== false && strpos($uri, '?sort') == false)
            { 
                $uripart = explode('?', $uri);
                $uripart = explode('&', $uripart[1]);
                $fullurl = 'index.php/blog?'.$uripart[0].'&';                
            }
            else
            {                 
                $fullurl = 'index.php/blog?';
            }
            
            ?>
            <select id="sorting" name="sorting" onchange="location = this.value;" class="form-control">
                <option disabled selected value> - </option>
                <option value="<?php echo PRE_INDEX_URL.$fullurl.'sort=straight'; ?>">Newer top</option>
                <option value="<?php echo PRE_INDEX_URL.$fullurl.'sort=reverse' ?>">Older top</option>                
            </select>