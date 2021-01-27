<?php
/**
 * Plugin Name: posts pagination
 */

    function rest_endpoint_handler($request){
        $response = [];
        $parameters = $request->get_params();
        $posts_page_no = ! empty($parameters['page_no']) ? intval(sanitize_text_field($parameters['page_no'])) : '';

        $error = new WP_Error();

        $args= [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'fields'=>'ids',
            'orderby'=>'date',
            'paged' => $posts_page_no,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ];
        $latest_posts_ids = new WP_Query($args);
        $post_ids = $latest_posts_ids->posts;
        $post_result = [];
        if(empty($post_ids) && !is_array($post_ids)){
            return $post_result;
        }
        foreach($post_ids as $post_id){
            $author_id = get_post_field('post_author',$post_id);
            $attachment_id = get_post_thumbnail_id($post_id);
            $post_data = [];
            $post_data['id'] = $post_id;
            $post_data['title'] = get_the_title($post_id);
            $post_data['excerpt'] = get_the_excerpt($post_id);
            $post_data['date'] = get_the_date('',$post_id);
            $post_data['attachment_image'] = [
                'img_sizes'=>wp_get_attachment_image_sizes($attachment_id),
                'img_src'=>wp_get_attachment_image_src($attachment_id,'full'),
                'img_srcset'=>wp_get_attachment_image_srcset($attachment_id)
            ];
            $post_data['categories'] = get_the_category($post_id);
            $post_data['meta'] = [
                'author_id'=>$author_id,
                'author_name'=>get_the_author_meta('display_name',$author_id)
            ];

          array_push($post_result,$post_data);  
        }

        $found_posts =  $latest_posts_ids->found_posts;
        $page_count = ((int)($found_posts / 4)+(($found_posts % 4) ? 1 : 0));
        
        if(!empty($post_result)){
            $response['status'] = 200;
            $response['posts_data'] = $post_result;
            $response['found_posts'] = $found_posts;
            $response['page_count'] = $page_count;
            return $response;
        }else{
            $error->add(406,__('Posts not found','rest-api-endpoints'));
            return $error;
        }

        // return [
        //     'posts_data' => $post_result,
        //     'found_posts' => $found_posts,
        //     'page_count' => $page_count
        // ];
    }

    add_action('rest_api_init',function(){

        register_rest_route('allposts/v1','/posts',[
            'methods'=>'POST',
            'callback'=>'rest_endpoint_handler'
        ]);

    });
 ?>