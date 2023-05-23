<!-- Reiseübersicht-section -->
<section class="reiseübersicht-section">
    <h1 class="AvenirDemi">Reiseübersicht</h1>
    <div class="covid-info">
        <svg width="37" height="37" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92894C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.76121C17.6541 3.51809 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C21.9971 14.6513 20.9426 17.1931 19.0679 19.0679C17.1931 20.9426 14.6513 21.9971 12 22V22ZM12 4C10.4178 4 8.87104 4.4692 7.55544 5.34825C6.23985 6.2273 5.21447 7.47673 4.60897 8.93854C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C19.9976 9.879 19.154 7.84556 17.6542 6.34578C16.1545 4.84601 14.121 4.00239 12 4V4ZM12 17C11.7348 17 11.4804 16.8946 11.2929 16.7071C11.1054 16.5196 11 16.2652 11 16V11C11 10.7348 11.1054 10.4804 11.2929 10.2929C11.4804 10.1054 11.7348 10 12 10C12.2652 10 12.5196 10.1054 12.7071 10.2929C12.8946 10.4804 13 10.7348 13 11V16C13 16.2652 12.8946 16.5196 12.7071 16.7071C12.5196 16.8946 12.2652 17 12 17ZM12 9C11.8022 9 11.6089 8.94136 11.4444 8.83147C11.28 8.72159 11.1518 8.56541 11.0761 8.38269C11.0004 8.19996 10.9806 7.9989 11.0192 7.80491C11.0578 7.61093 11.153 7.43275 11.2929 7.2929C11.4328 7.15305 11.6109 7.0578 11.8049 7.01922C11.9989 6.98063 12.2 7.00044 12.3827 7.07612C12.5654 7.15181 12.7216 7.27999 12.8315 7.44443C12.9414 7.60888 13 7.80222 13 8C13 8.26522 12.8946 8.51957 12.7071 8.70711C12.5196 8.89465 12.2652 9 12 9Z"
                fill="black" />
        </svg>

        <p class="AvenirRegular">Es bestehen aktuell keine <span>
                COVID-19-bedingten Einreisebeschränkungen.
            </span> COVID-Tests und Impfnachweise sind nicht mehr nachzuweisen (Stand 22.06.2022)</p>
    </div>
 
            <div class="faqs-container">
            <?php
            $accordionItems = get_field("accordion_details");
                        foreach($accordionItems as $item):
                                $accordion_title = get_field("accordion_title", $item->ID);
                                $accordion_header = get_field("accordion_header", $item->ID);
                                $accordion_info_text = get_field("accordion_info_text", $item->ID);
                                // $tripcountries = get_the_terms($post->ID, "trip_countries");
                                // $tags = "";
                                // foreach ($tripcountries as $tripcountry) {
                                //     $tags .= $tripcountry->name . ", ";
                                //     // 
                                // }
                                ?>
                <div class="faq">
                    <h3 class="faq-title">
                    <?php echo $accordion_header; ?>header
                    </h3>
                    <div class="faq-text">
                        <p>
                        <?php echo $accordion_info_text; ?> paragraph
                        </p>
                    </div>
                    <button class="faq-toggle">
                        <i class="fa-solid fa-plus"></i>
                        <i class="fa-solid fa-minus"></i>
                    </button>
                </div>
                <?php
                endforeach; ?>
            </div>        
</section>        