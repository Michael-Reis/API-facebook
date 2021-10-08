
<?php
header('Content-Type: text/html; charset=utf-8');
include('conexao.php');
include('controller/tratamento.php'); 
include('componentes/facebook.php');  
include('componentes/action.php');  

$tratamento = new Tratamento(); 
$codconta = "act_1416285178742937";
$accesstoken = "EAAiPo8J97P4BAAqnVsfOzYILbwSgGCxROwCGAVMowJsuloXr21qIGcQAOwGo2MSuxvW98dXNdSuatAlDVmRjjMMTQWSIfUxvnEWq1Rb4Sc49xBehc102tNWjZCbRjKcOk3H3hNYJcNKoFya4tYARCiKmdWVTxrjj1OdFQdOCn6uMGZCjqv2wInjT5CR8DNZB1wNYpgYOzQ4xZCjPUa9Bs1Q3OznHDkoZD";
$datas = "{'since':'2021-01-01','until':'2021-10-08'}"; 


$compfacebook = new Facebook();
$compfacebook->conexao = $conexao; 


$action = new Action();
$action->conexao = $conexao;  


$colunas = array(
    "account_id",
    "account_name",
    "account_currency",
    "campaign_id", 
    "adset_id",
    "impressions",
    "spend",
    "ad_id",
    "ad_name",
    "adset_name",
    "attribution_setting",
    "buying_type",
    "campaign_name",
    "canvas_avg_view_percent",
    "canvas_avg_view_time",
    "catalog_segment_value",
    "clicks",
    "conversion_rate_ranking",
    "conversion_values",
    "conversions",
    "converted_product_quantity",
    "converted_product_value",
    "cost_per_estimated_ad_recallers",
    "cost_per_inline_link_click",
    "cost_per_inline_post_engagement",
    "cost_per_outbound_click",
    "cost_per_thruplay",
    "cost_per_unique_action_type",
    "cost_per_unique_click",
    "cost_per_unique_inline_link_click",
    "cost_per_unique_outbound_click",
    "cost_per_action_type",
    "cost_per_conversion",
    "cpc",
    "cpm",
    "cpp",
    "ctr",
    "date_start",
    "date_stop",
    "dda_results",
    "engagement_rate_ranking",
    "estimated_ad_recall_rate",
    "estimated_ad_recallers",
    "frequency",
    "full_view_impressions",
    "full_view_reach",
    "inline_link_click_ctr",
    "inline_link_clicks",
    "inline_post_engagement",
    "instant_experience_clicks_to_open",
    "instant_experience_clicks_to_start",
    "instant_experience_outbound_clicks",
    "mobile_app_purchase_roas",
    "objective",
    "outbound_clicks",
    "outbound_clicks_ctr",
    "optimization_goal",
    "purchase_roas",
    "place_page_name",
    "qualifying_question_qualify_answer_rate",
    "quality_ranking",
    "reach",
    "social_spend",
    // "total_postbacks", // ta quebrando a api
    "video_play_curve_actions",
    "video_30_sec_watched_actions",
    "video_avg_time_watched_actions",
    "video_p100_watched_actions",
    "video_p25_watched_actions",
    "video_p50_watched_actions",
    "video_p75_watched_actions",
    "video_p95_watched_actions",
    "video_play_actions",
    "website_ctr",
    "website_purchase_roas",
    "actions",
   
); 

$colunastr = $tratamento->arrayParaString($colunas, ",");  
$content = file_get_contents("https://graph.facebook.com/v11.0/${codconta}/insights?time_range=${datas}&filtering=[]&level=ad&breakdowns=[]&fields=${colunastr}&access_token=${accesstoken}"); 
$result = json_decode($content);

$numeroDePaginas = 0;
$contador = 0;
$paginaFinal = 0;
$qtdregistros = count($result->data);

while ($paginaFinal == 0) {
    if($contador < $qtdregistros) {
        $compfacebook->account_id = $result->data[$contador]->account_id;
        $compfacebook->account_name = $result->data[$contador]->account_name;
        $compfacebook->account_currency = $result->data[$contador]->account_currency;
        $compfacebook->campaign_id = $result->data[$contador]->campaign_id;
        $compfacebook->adset_id = $result->data[$contador]->adset_id;
        $compfacebook->impressions = $result->data[$contador]->impressions;
        $compfacebook->spend = $result->data[$contador]->spend;
        $compfacebook->ad_id = $result->data[$contador]->ad_id;
        $ad_id = $result->data[$contador]->ad_id;
        $compfacebook->ad_name = $result->data[$contador]->ad_name;
        $compfacebook->adset_name = $result->data[$contador]->adset_name;
        $compfacebook->buying_type = $result->data[$contador]->buying_type;
        $compfacebook->campaign_name = $result->data[$contador]->campaign_name;
        $compfacebook->clicks = $result->data[$contador]->clicks;
        $compfacebook->conversion_rate_ranking = $result->data[$contador]->conversion_rate_ranking;
        $compfacebook->cost_per_inline_link_click = isset($result->data[$contador]->cost_per_inline_link_click) ? $result->data[$contador]->cost_per_inline_link_click : NULL;
        $compfacebook->cost_per_inline_post_engagement = isset($result->data[$contador]->cost_per_inline_post_engagement) ? $result->data[$contador]->cost_per_inline_post_engagement : NULL;
        $compfacebook->cost_per_unique_click = isset($result->data[$contador]->cost_per_unique_click) ? $result->data[$contador]->cost_per_unique_click : NULL;
        $compfacebook->cost_per_unique_inline_link_click = isset($result->data[$contador]->cost_per_unique_inline_link_click) ? $result->data[$contador]->cost_per_unique_inline_link_click : NULL;
        $compfacebook->cpc = isset($result->data[$contador]->cpc) ? $result->data[$contador]->cpc : NULL;
        $compfacebook->cpm = isset($result->data[$contador]->cpm) ? $result->data[$contador]->cpm : NULL;
        $compfacebook->cpp = isset($result->data[$contador]->cpp) ? $result->data[$contador]->cpp : NULL;
        $compfacebook->ctr = isset($result->data[$contador]->cpc) ? $result->data[$contador]->ctr : NULL;
        $compfacebook->inline_link_click_ctr = isset($result->data[$contador]->inline_link_click_ctr) ? $result->data[$contador]->inline_link_click_ctr : NULL;
        $compfacebook->date_start = $result->data[$contador]->date_start;
        $compfacebook->date_stop = $result->data[$contador]->date_stop;
        $compfacebook->engagement_rate_ranking = $result->data[$contador]->engagement_rate_ranking;
        $compfacebook->frequency = $result->data[$contador]->frequency;
        $compfacebook->inline_link_clicks = $result->data[$contador]->inline_link_clicks;
        $compfacebook->inline_post_engagement = $result->data[$contador]->inline_post_engagement;
        $compfacebook->instant_experience_clicks_to_open = isset($result->data[$contador]->instant_experience_clicks_to_open) ? $result->data[$contador]->instant_experience_clicks_to_open : NULL ;
        $compfacebook->instant_experience_clicks_to_start = isset($result->data[$contador]->instant_experience_clicks_to_start) ? $result->data[$contador]->instant_experience_clicks_to_start : NULL;
        $compfacebook->objective = $result->data[$contador]->objective;
        $compfacebook->optimization_goal = $result->data[$contador]->optimization_goal;
        $compfacebook->quality_ranking = $result->data[$contador]->quality_ranking;
        $compfacebook->reach = $result->data[$contador]->reach;
        $compfacebook->social_spend = $result->data[$contador]->social_spend;
        $compfacebook->insereDados(); 
        isset($result->data[$contador]->action_values) ? $action->OrganizaArray($result->data[$contador]->action_values, $ad_id, "action_values") : NULL;
        isset($result->data[$contador]->actions) ? $action->OrganizaArray($result->data[$contador]->actions, $ad_id, "actions" ) : NULL;
        isset($result->data[$contador]->catalog_segment_value) ? $action->OrganizaArray($result->data[$contador]->catalog_segment_value, $ad_id, "catalog_segment_value") : NULL; 
        isset($result->data[$contador]->conversion_values) ? $action->OrganizaArray($result->data[$contador]->conversion_values, $ad_id, "conversion_values") : NULL;
        isset($result->data[$contador]->conversions) ? $action->OrganizaArray($result->data[$contador]->conversions, $ad_id, "conversions") : NULL;
        isset($result->data[$contador]->converted_product_quantity) ? $action->OrganizaArray($result->data[$contador]->converted_product_quantity, $ad_id, "converted_product_quantity") : NULL;
        isset($result->data[$contador]->converted_product_value) ? $action->OrganizaArray($result->data[$contador]->converted_product_value, $ad_id, "converted_product_value") : NULL;
        isset($result->data[$contador]->cost_per_action_type) ? $action->OrganizaArray($result->data[$contador]->cost_per_action_type, $ad_id, "cost_per_action_type") : NULL ;
        isset($result->data[$contador]->cost_per_conversion) ? $action->OrganizaArray($result->data[$contador]->cost_per_conversion, $ad_id, "cost_per_conversion") : NULL;
        isset($result->data[$contador]->cost_per_outbound_click) ? $action->OrganizaArray($result->data[$contador]->cost_per_outbound_click, $ad_id, "cost_per_outbound_click") : NULL;
        isset($result->data[$contador]->cost_per_thruplay) ? $action->OrganizaArray($result->data[$contador]->cost_per_thruplay, $ad_id, "cost_per_thruplay") : NULL;
        isset($result->data[$contador]->cost_per_unique_action_type) ? $action->OrganizaArray($result->data[$contador]->cost_per_unique_action_type, $ad_id, "cost_per_unique_action_type") : NULL;
        isset($result->data[$contador]->cost_per_unique_outbound_click) ? $action->OrganizaArray($result->data[$contador]->cost_per_unique_outbound_click, $ad_id, "cost_per_unique_outbound_click") : NULL;
        isset($result->data[$contador]->dda_results) ? $action->OrganizaArray($result->data[$contador]->dda_results, $ad_id, "dda_results") : NULL;
        isset($result->data[$contador]->instant_experience_outbound_clicks) ? $action->OrganizaArray($result->data[$contador]->instant_experience_outbound_clicks, $ad_id, "instant_experience_outbound_clicks") : NULL;
        isset($result->data[$contador]->mobile_app_purchase_roas) ? $action->OrganizaArray($result->data[$contador]->mobile_app_purchase_roas, $ad_id, "mobile_app_purchase_roas") : NULL; 
        isset($result->data[$contador]->outbound_clicks) ? $action->OrganizaArray($result->data[$contador]->outbound_clicks, $ad_id, "outbound_clicks") : NULL;
        isset($result->data[$contador]->outbound_clicks_ctr) ? $action->OrganizaArray($result->data[$contador]->outbound_clicks_ctr, $ad_id, "outbound_clicks_ctr") : NULL;
        isset($result->data[$contador]->post_conversion_signal_result) ? $action->OrganizaArray($result->data[$contador]->post_conversion_signal_result, $ad_id, "post_conversion_signal_result") : NULL;
        isset($result->data[$contador]->purchase_roas) ? $action->OrganizaArray($result->data[$contador]->purchase_roas, $ad_id, "purchase_roas") : NULL;
        isset($result->data[$contador]->video_30_sec_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_30_sec_watched_actions, $ad_id, "video_30_sec_watched_actions") : NULL;
        isset($result->data[$contador]->video_avg_time_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_avg_time_watched_actions, $ad_id, "video_avg_time_watched_actions") : NULL;
        isset($result->data[$contador]->video_p100_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_p100_watched_actions, $ad_id, "video_p100_watched_actions") : NULL;
        isset($result->data[$contador]->video_p25_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_p25_watched_actions, $ad_id, "video_p25_watched_actions") : NULL;
        isset($result->data[$contador]->video_p50_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_p50_watched_actions, $ad_id, "video_p50_watched_actions") : NULL;
        isset($result->data[$contador]->video_p75_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_p75_watched_actions, $ad_id, "video_p75_watched_actions") : NULL;
        isset($result->data[$contador]->video_p95_watched_actions) ? $action->OrganizaArray($result->data[$contador]->video_p95_watched_actions, $ad_id, "video_p95_watched_actions") : NULL;
        isset($result->data[$contador]->video_play_actions) ? $action->OrganizaArray($result->data[$contador]->video_play_actions, $ad_id, "video_play_actions") : NULL;
        isset($result->data[$contador]->website_ctr) ? $action->OrganizaArray($result->data[$contador]->website_ctr, $ad_id, "website_ctr") : NULL;
        isset($result->data[$contador]->website_purchase_roas) ? $action->OrganizaArray($result->data[$contador]->website_purchase_roas, $ad_id, "website_purchase_roas") : NULL;
        isset($result->data[$contador]->purchase_roas) ? $action->OrganizaArray($result->data[$contador]->purchase_roas, $ad_id, "purchase_roas") : NULL;
        $contador++; 

    }else{
        $nexts = isset($result->paging->next) ? $result->paging->next : NULL; 
        if($nexts != null){ 
            $contents = file_get_contents($nexts);
            $result = json_decode($contents);
            $qtdregistros = count($result->data);
            $contador = 0;
            $numeroDePaginas++; 
        }else{
            $paginaFinal = 1;
        }

    }
}



?>