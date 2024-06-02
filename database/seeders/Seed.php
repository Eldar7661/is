<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class Seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i=0; $i < 11; $i++) {
        //     DB::table('articles')->insert([
        //         'title' => $this->gen(10),
        //         'text' => $this->gen(150),
        //     ]);
        // }

        foreach ($this->users as $user) {
            DB::table('users')->insert($user);
        }
        foreach ($this->articles as $article) {
            DB::table('articles')->insert($article);
        }
    }

    protected function gen($count) {
        $text = '';
        for ($i=0; $i < $count; $i++) {
            $text .= ' ';
            $text .= Str::random(7);
        }
        return $text;
    }


    protected $users;
    protected $articles;
    public function __construct()
    {
        $this->users = [
            [
                'name' => 'Oliver Hughes',
                'surname' => 'Campbell',
                'email' => 'oliver.hughes@email.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Sophia Adams',
                'surname' => 'Thompson',
                'email' => 'sophia.adams@email.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Benjamin Parker',
                'surname' => 'Wright',
                'email' => 'benjamin.parker@email.com',
                'password' => Hash::make('12345678'),
            ],
        ];

        $this->articles = [
            [
                'title' => "The Rise of Sustainable Fashion",
                'user_id' => 1,
                'text' => "With increasing environmental concerns, the fashion industry is shifting towards sustainability. From recycled materials to ethical production practices, discover how fashion brands are embracing eco-friendly initiatives. Sustainable fashion is not just a trend; it's a movement towards a more responsible and conscious industry. Consumers are becoming more aware of the environmental and social impact of their clothing choices, leading to a growing demand for sustainable alternatives. By prioritizing transparency, ethical labor practices, and eco-friendly materials, fashion brands can contribute to a more sustainable future. With increasing environmental concerns, the fashion industry is shifting towards sustainability. From recycled materials to ethical production practices, discover how fashion brands are embracing eco-friendly initiatives. Sustainable fashion is not just a trend; it's a movement towards a more responsible and conscious industry. Consumers are becoming more aware of the environmental and social impact of their clothing choices, leading to a growing demand for sustainable alternatives. By prioritizing transparency, ethical labor practices, and eco-friendly materials, fashion brands can contribute to a more sustainable future.",
            ],
            [
                'title' => "Exploring the Benefits of Meditation",
                'user_id' => 1,
                'text' => "Meditation has numerous benefits for both the mind and body. From reducing stress and anxiety to improving focus and emotional well-being, learn how incorporating meditation into your daily routine can transform your life. Research has shown that regular meditation practice can lower blood pressure, boost immune function, and even promote neuroplasticity, the brain's ability to adapt and change. Whether you're a beginner or an experienced practitioner, carving out time for meditation can have profound effects on your overall health and well-being.",
            ],
            [
                'title' => "The Future of Remote Work",
                'user_id' => 1,
                'text' => "Remote work has become increasingly popular, offering flexibility and freedom for employees. Explore how advancements in technology are shaping the future of remote work and its impact on businesses and individuals. With tools like video conferencing, cloud computing, and project management software, teams can collaborate effectively from anywhere in the world. Remote work also presents opportunities for cost savings, reduced commute times, and a better work-life balance. As the workforce becomes more distributed, employers must adapt their policies and practices to support remote employees and foster a culture of trust and accountability.",
            ],
            [
                'title' => "The Art of Storytelling in Marketing",
                'user_id' => 1,
                'text' => "Storytelling is a powerful tool in marketing, allowing brands to connect with their audience on a deeper level. Discover how crafting compelling narratives can captivate customers and drive engagement. In a crowded marketplace, storytelling sets brands apart by creating emotional connections and fostering loyalty. By tapping into universal themes and emotions, brands can resonate with their target audience and inspire action. Whether it's through video content, social media posts, or brand storytelling campaigns, effective storytelling can elevate your marketing efforts and leave a lasting impression on consumers.",
            ],
            [
                'title' => "The Impact of Artificial Intelligence on Healthcare",
                'user_id' => 1,
                'text' => "Artificial intelligence is revolutionizing the healthcare industry, from diagnosis to treatment. Explore the transformative potential of AI in improving patient care, streamlining processes, and advancing medical research. With machine learning algorithms and predictive analytics, healthcare providers can analyze vast amounts of data to identify trends and patterns, leading to more accurate diagnoses and personalized treatment plans. AI-powered tools like chatbots and virtual assistants also enhance patient engagement and support remote healthcare delivery. As AI continues to evolve, it has the potential to revolutionize every aspect of healthcare, from drug discovery to clinical decision-making.",
            ],
            [
                'title' => "The Rise of Plant-Based Diets",
                'user_id' => 1,
                'text' => "Plant-based diets are gaining popularity due to their health and environmental benefits. Learn about the science behind plant-based eating and how it can contribute to a more sustainable future. By replacing animal products with fruits, vegetables, whole grains, and legumes, plant-based diets can lower the risk of chronic diseases like heart disease, diabetes, and cancer. They also have a smaller environmental footprint, requiring fewer natural resources and producing fewer greenhouse gas emissions. Whether you're a vegan, vegetarian, or simply looking to incorporate more plant-based meals into your diet, there are plenty of delicious and nutritious options to explore.",
            ],
            [
                'title' => "The Psychology of Motivation",
                'user_id' => 2,
                'text' => "Understanding the psychology of motivation is key to achieving personal and professional success. Explore the factors that influence motivation and strategies for maintaining drive and momentum. Motivation is a complex interplay of internal and external factors, including goals, beliefs, rewards, and social influences. By setting clear goals, cultivating a growth mindset, and breaking tasks into manageable steps, you can boost your motivation and productivity. Surrounding yourself with supportive peers and celebrating small wins along the way can also help you stay motivated and focused on your goals.",
            ],
            [
                'title' => "The Evolution of Social Media",
                'user_id' => 2,
                'text' => "Social media has evolved rapidly since its inception, reshaping communication, marketing, and society as a whole. Dive into the history of social media and its implications for the future. From the early days of MySpace and Friendster to the rise of Facebook, Instagram, and TikTok, social media platforms have fundamentally changed the way we connect and communicate. They have also transformed the way businesses engage with customers, allowing for targeted advertising, influencer partnerships, and real-time customer feedback. As social media continues to evolve, it presents both opportunities and challenges for individuals, businesses, and society at large.",
            ],
            [
                'title' => "The Power of Positive Thinking",
                'user_id' => 2,
                'text' => "Positive thinking can have a profound impact on mental health and overall well-being. Discover the science behind the power of positive thinking and practical strategies for cultivating optimism. Research has shown that a positive outlook can reduce stress, improve immune function, and enhance resilience in the face of adversity. By reframing negative thoughts, practicing gratitude, and focusing on solutions rather than problems, you can train your brain to adopt a more positive mindset. Cultivating positivity takes time and effort, but the benefits are well worth it for your mental and emotional health.",
            ],
            [
                'title' => "The Future of Renewable Energy",
                'user_id' => 2,
                'text' => "Renewable energy sources like solar and wind power are poised to play a significant role in combating climate change. Explore the latest advancements in renewable energy technology and their potential to reshape the global energy landscape. As the world transitions away from fossil fuels, renewable energy sources are becoming increasingly important for meeting growing energy demand while reducing greenhouse gas emissions. From solar panels and wind turbines to hydroelectric and geothermal power, renewable energy technologies offer clean, sustainable alternatives to traditional forms of energy production. By investing in renewable energy infrastructure and supporting research and development, we can accelerate the transition to a clean energy future.",
            ],
            [
                'title' => "Unlocking Creativity: Strategies for Innovation",
                'user_id' => 2,
                'text' => "Creativity is essential for innovation and problem-solving in today's fast-paced world. Learn techniques for unlocking your creative potential and fostering innovation in your personal and professional life. Creativity is not just about coming up with new ideas; it's about approaching problems from different perspectives and connecting seemingly unrelated concepts. By embracing experimentation, embracing failure, and cultivating a curious mindset, you can unleash your creative potential and drive meaningful change in your work and life. Whether you're a designer, entrepreneur, or educator, creativity is a valuable skill that can be developed and nurtured over time.",
            ],
            [
                'title' => "The Art of Mindfulness",
                'user_id' => 2,
                'text' => "Mindfulness is a practice that involves being fully present in the moment, without judgment. Discover the benefits of mindfulness for stress reduction, mental clarity, and overall well-being. Mindfulness meditation techniques, such"
            ],
            [
                'title' => "The Impact of Climate Change on Biodiversity",
                'user_id' => 3,
                'text' => "Climate change poses a significant threat to biodiversity, with ecosystems around the world facing unprecedented challenges. Explore the link between climate change and biodiversity loss, and learn about conservation efforts to mitigate its effects. Rising temperatures, shifting precipitation patterns, and extreme weather events are disrupting ecosystems and threatening the survival of many plant and animal species. Conservation efforts, such as habitat restoration, species reintroduction, and protected area management, are crucial for preserving biodiversity in the face of climate change.",
            ],
            [
                'title' => "The Psychology of Decision-Making",
                'user_id' => 3,
                'text' => "Decision-making is a fundamental aspect of everyday life, influenced by cognitive biases, emotions, and social factors. Explore the psychology behind decision-making and techniques for making better choices. From simple decisions like what to eat for breakfast to complex choices like where to live or work, our decisions are shaped by a variety of factors. Understanding these factors can help us make more informed decisions and avoid common pitfalls, such as confirmation bias, anchoring, and loss aversion.",
            ],
            [
                'title' => "The Future of Artificial Intelligence in Education",
                'user_id' => 3,
                'text' => "Artificial intelligence has the potential to revolutionize education, personalizing learning experiences and improving student outcomes. Explore how AI is being integrated into classrooms and its impact on the future of education. Adaptive learning platforms, intelligent tutoring systems, and virtual reality simulations are just a few examples of how AI is transforming the way we teach and learn. By tailoring instruction to individual learning styles and preferences, AI-powered educational tools can help students master difficult concepts, stay engaged, and achieve their full potential.",
            ],
            [
                'title' => "The Health Benefits of Regular Exercise",
                'user_id' => 3,
                'text' => "Regular exercise is essential for maintaining physical and mental health, reducing the risk of chronic diseases and improving overall well-being. Discover the numerous benefits of staying active and practical tips for incorporating exercise into your daily routine. From boosting mood and energy levels to strengthening muscles and bones, the benefits of exercise are undeniable. Whether you prefer running, swimming, cycling, or yoga, finding activities you enjoy can make it easier to stick to a regular exercise routine. Start small, set achievable goals, and gradually increase the intensity and duration of your workouts to reap the full rewards of exercise.",
            ],
            [
                'title' => "The Ethics of Genetic Engineering",
                'user_id' => 3,
                'text' => "Genetic engineering holds promise for addressing pressing global challenges, but it also raises ethical concerns about genetic manipulation and designer babies. Explore the ethical implications of genetic engineering and the need for responsible innovation. From gene editing and cloning to genetic screening and gene therapy, advances in genetic engineering have the potential to revolutionize medicine, agriculture, and environmental conservation. However, ethical considerations, such as consent, equity, and unintended consequences, must be carefully considered to ensure that genetic technologies are used responsibly and ethically.",
            ],
            [
                'title' => "The Future of Space Exploration",
                'user_id' => 3,
                'text' => "Humanity's quest to explore the cosmos is entering a new era, with ambitious missions to Mars, the moon, and beyond. Delve into the future of space exploration and the technologies driving humanity's journey to the stars. From reusable rockets and space tourism to lunar habitats and interplanetary colonization, the future of space exploration is full of possibilities. As private companies and government agencies invest in space exploration, we are on the verge of new discoveries and advancements that will shape the future of humanity for generations to come.",
            ],
        ];
    }
}
