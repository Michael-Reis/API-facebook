<?php 

    class Facebook { 
        public $conexao; 
        public $idfacebookapi;
        public $account_id; 
        public $account_currency; 
        public $account_name; 
        public $ad_id; 
        public $ad_name; 
        public $adset_id; 
        public $adset_name; 
        public $attribution_setting; 
        public $buying_type; 
        public $campaign_id; 
        public $campaign_name; 
        public $clicks; 
        public $conversion_rate_ranking; 
        public $cost_per_inline_link_click; 
        public $cost_per_inline_post_engagement; 
        public $cost_per_unique_click; 
        public $cost_per_unique_inline_link_click; 
        public $cpc; 
        public $cpm; 
        public $cpp; 
        public $ctr; 
        public $date_start; 
        public $date_stop; 
        public $engagement_rate_ranking; 
        public $frequency; 
        public $impressions; 
        public $inline_link_click_ctr; 
        public $inline_link_clicks; 
        public $inline_post_engagement; 
        public $instant_experience_clicks_to_open; 
        public $instant_experience_clicks_to_start; 
        public $objective; 
        public $optimization_goal; 
        public $place_page_name; 
        public $qualifying_question_qualify_answer_rate; 
        public $quality_ranking; 
        public $reach; 
        public $social_spend; 
        public $spend; 
        public $total_postbacks;


        public function GetAll(){
            $qry = " SELECT idfacebookapi,
            account_id, 
            account_currency, 
            account_name, 
            ad_id, 
            ad_name, 
            adset_id, 
            adset_name, 
            attribution_setting, 
            buying_type, 
            campaign_id, 
            campaign_name, 
            clicks, 
            conversion_rate_ranking, 
            cost_per_inline_link_click, 
            cost_per_inline_post_engagement, 
            cost_per_unique_click, 
            cost_per_unique_inline_link_click, 
            cpc, 
            cpm, 
            cpp, 
            ctr, 
            date_start, 
            date_stop, 
            engagement_rate_ranking, 
            frequency, 
            impressions, 
            inline_link_click_ctr, 
            inline_link_clicks, 
            inline_post_engagement, 
            instant_experience_clicks_to_open, 
            instant_experience_clicks_to_start, 
            objective, 
            optimization_goal, 
            place_page_name, 
            qualifying_question_qualify_answer_rate, 
            quality_ranking, 
            reach, 
            social_spend, 
            spend, 
            total_postbacks
            FROM facebook";

            $result = mysqli_query($this->conexao, $qry);
            return $result;  
        }   



        public function insereDados(){
            $qry = "SELECT * FROM facebook WHERE ad_id = '{$this->ad_id}' "; 
            echo $qry . "<br><br>";

            $result = mysqli_query($this->conexao, $qry);
            $rows = mysqli_num_rows($result);
            
            if($rows < 1){
                echo "não existe, então insere: "; 
                $insere = "INSERT INTO facebook(account_id, 
                account_name,
                account_currency,
                campaign_id,
                adset_id,
                impressions,
                spend,
                ad_id,
                ad_name,
                adset_name,
                buying_type,
                campaign_name,
                clicks,
                conversion_rate_ranking,
                cost_per_inline_link_click,
                cost_per_inline_post_engagement,
                cost_per_unique_click,
                cost_per_unique_inline_link_click,
                cpc,
                cpm,
                cpp,
                ctr,
                inline_link_click_ctr,
                date_start,
                date_stop,
                engagement_rate_ranking,
                frequency,
                inline_link_clicks,
                inline_post_engagement,
                instant_experience_clicks_to_open,
                instant_experience_clicks_to_start,
                objective,
                optimization_goal,
                quality_ranking,
                reach,
                social_spend) VALUES ( '{$this->account_id}', 
                '{$this->account_name}',
                '{$this->account_currency}',
                '{$this->campaign_id}',
                '{$this->adset_id}',
                '{$this->impressions}',
                '{$this->spend}',
                '{$this->ad_id}',
                '{$this->ad_name}',
                '{$this->adset_name}',
                '{$this->buying_type}',
                '{$this->campaign_name}',
                '{$this->clicks}',
                '{$this->conversion_rate_ranking}',
                '{$this->cost_per_inline_link_click}',
                '{$this->cost_per_inline_post_engagement}',
                '{$this->cost_per_unique_click}',
                '{$this->cost_per_unique_inline_link_click}',
                '{$this->cpc}',
                '{$this->cpm}',
                '{$this->cpp}',
                '{$this->ctr}',
                '{$this->inline_link_click_ctr}',
                '{$this->date_start}',
                '{$this->date_stop}',
                '{$this->engagement_rate_ranking}',
                '{$this->frequency}',
                '{$this->inline_link_clicks}',
                '{$this->inline_post_engagement}',
                '{$this->instant_experience_clicks_to_open}',
                '{$this->instant_experience_clicks_to_start}',
                '{$this->objective}',
                '{$this->optimization_goal}',
                '{$this->quality_ranking}',
                '{$this->reach}',
                '{$this->social_spend}')";  
                mysqli_query($this->conexao, $insere);  
                echo $insere;
                echo "Guardado com sucesso<br><br>"; 
            }else{
                $qry = "UPDATE facebook SET 
                account_id = '{$this->account_id}',
                account_name = '{$this->account_name}',
                account_currency = '{$this->account_currency}',
                campaign_id = '{$this->campaign_id}',
                adset_id = '{$this->adset_id}',
                impressions = '{$this->impressions}',
                spend = '{$this->spend}',
                ad_id = '{$this->ad_id}',
                ad_name = '{$this->ad_name}',
                adset_name = '{$this->adset_name}',
                buying_type = '{$this->buying_type}',
                campaign_name = '{$this->campaign_name}',
                clicks = '{$this->clicks}',
                conversion_rate_ranking = '{$this->conversion_rate_ranking}',
                cost_per_inline_link_click = '{$this->cost_per_inline_link_click}',
                cost_per_inline_post_engagement = '{$this->cost_per_inline_post_engagement}',
                cost_per_unique_click = '{$this->cost_per_unique_click}',
                cost_per_unique_inline_link_click = '{$this->cost_per_unique_inline_link_click}',
                cpc = '{$this->cpc}',
                cpm = '{$this->cpm}',
                cpp = '{$this->cpp}',
                ctr = '{$this->ctr}',
                inline_link_click_ctr = '{$this->inline_link_click_ctr}',
                date_start = '{$this->date_start}',
                date_stop = '{$this->date_stop}',
                engagement_rate_ranking = '{$this->engagement_rate_ranking}',
                frequency = '{$this->frequency}',
                inline_link_clicks = '{$this->inline_link_clicks}',
                inline_post_engagement = '{$this->inline_post_engagement}',
                instant_experience_clicks_to_open = '{$this->instant_experience_clicks_to_open}',
                instant_experience_clicks_to_start = '{$this->instant_experience_clicks_to_start}',
                objective = '{$this->objective}',
                optimization_goal = '{$this->optimization_goal}',
                quality_ranking = '{$this->quality_ranking}',
                reach = '{$this->reach}',
                social_spend = '{$this->social_spend}'
                WHERE ad_id = '{$this->ad_id}'"; 

                mysqli_query($this->conexao, $qry); 
                echo $qry;
                Echo "Já existe no banco o ad_id: '{$this->ad_id}'"; 
            }

        }
    

        public function DadosFacebook(){
            $au = $this->GetAll();
            while($du = mysqli_fetch_array($au,MYSQLI_ASSOC))
            {
                
            } 
                
        }
    }
?>