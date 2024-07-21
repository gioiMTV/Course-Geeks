<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentHtml = "<div>
        <h2>Course Descriptions</h2>
        <p>If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on.</p>
        <p>Next, you’ll explore the basics of the language, giving plenty of examples. Lastly, you’ll put your JavaScript knowledge to work and modify a modern, responsive web page. When you’re finished with this course, you’ll have the skills and knowledge in JavaScript to create simple programs, create simple web applications, and modify web pages.</p>
    
        <h3>What you’ll learn</h3>
        <ul>
            <li>Recognize the importance of understanding your objectives when addressing an audience.</li>
            <li>Identify the fundamentals of composing a successful close.</li>
            <li>Explore how to connect with your audience through crafting compelling stories.</li>
            <li>Examine ways to connect with your audience by personalizing your content.</li>
            <li>Break down the best ways to exude executive presence.</li>
            <li>Explore how to communicate the unknown in an impromptu communication.</li>
        </ul>
    
        <p>Maecenas viverra condimentum nulla molestie condimentum. Nunc ex libero, feugiat quis lectus vel, ornare euismod ligula. Aenean sit amet arcu nulla.</p>
        <p>Duis facilisis ex a urna blandit ultricies. Nullam sagittis ligula non eros semper, nec mattis odio ullamcorper. Phasellus feugiat sit amet leo eget consectetur.</p>
    
        <h3>Image Alignment</h3>
        <p>Welcome to image alignment! The best way to demonstrate the ebb and flow of the various image positioning options is to nestle them snugly among an ocean of words. Grab a paddle and let’s get started.</p>
        <img src='/assets/images/blog/center-img.jpg' alt='Centered Image'>
    
        <p>The image above happens to be centered.</p>
    
        <h3>Failure Quote</h3>
        <blockquote>
            \"Failure will never overtake me if my determination to succeed is strong enough.\"
            <br> — Og Mandino
        </blockquote>
    
        <p>Condimentum leo utipsum euismod feugiat elemen sapiennonser variusmi elementum necunc elementom velitnon tortor convallis variusa placerat neque. Quis eu Lorem irure magna. Ex labore reprehenderit veniam irure id nostrud velit. Minim aliquip cillum laborum qui Lorem eu.</p>
        <p>Sint officia nulla deserunt voluptate non amet consequat ipsum tempor. Nulla id cupidatat ipsum occaecat. Aute ad et fugiat velit sunt qui veniam labore elit ipsum commodo proident. Sit tempor consectetur commodo laborum mollit. Enim sint nostrud nisi in ad aliqua laboris ad non.</p>
    
        <h3>Unordered Lists (Nested)</h3>
        <ul>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Consectetur adipiscing elit</li>
            <li>Integer molestie lorem at massa</li>
            <li>Facilisis in pretium nisl aliquet</li>
            <li>Nulla volutpat aliquam velit
                <ul>
                    <li>Phasellus iaculis neque</li>
                    <li>Purus sodales ultricies</li>
                    <li>Vestibulum laoreet porttitor sem</li>
                    <li>Ac tristique libero volutpat at</li>
                </ul>
            </li>
            <li>Faucibus porta lacus fringilla vel</li>
            <li>Aenean sit amet erat nunc</li>
            <li>Eget porttitor lorem</li>
        </ul>
    
        <h3>Ordered List (Nested)</h3>
        <ol>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Consectetur adipiscing elit</li>
            <li>Integer molestie lorem at massa</li>
            <li>Facilisis in pretium nisl aliquet</li>
            <li>Nulla volutpat aliquam velit
                <ol>
                    <li>Phasellus iaculis neque</li>
                    <li>Purus sodales ultricies</li>
                    <li>Vestibulum laoreet porttitor sem</li>
                    <li>Ac tristique libero volutpat at</li>
                </ol>
            </li>
            <li>Faucibus porta lacus fringilla vel</li>
            <li>Aenean sit amet erat nunc</li>
            <li>Eget porttitor lorem</li>
        </ol>
    </div>
    ";

        DB::table('blog')->insert(
            [
                [
                    'poster' => 'blogpost-2.jpg',
                    'title' => 'Getting started the Web App JavaScript in 2020',
                    'description' => 'Our features, journey, tips and us being us. Lorem ipsum dolor sit amet, accumsan in, tempor dictum neque.',
                    'content' => $contentHtml,
                    'blog_cate_id' => 1,
                    'user_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-1.jpg',
                    'title' => 'What is PHP Function? For Beginner’s Guide',
                    'description' => 'Lorem ipsum dolor sit amet, accu msan in, tempor dictum nequrem ipsum...',
                    'content' => $contentHtml,
                    'blog_cate_id' => 3,
                    'user_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-3.jpg',
                    'title' => 'Getting started the Web App JavaScript in 2020',
                    'description' => 'Lorem ipsum dolor sit amet, accu msan in, tempor dictum nequrem ipsum...',
                    'content' => $contentHtml,
                    'blog_cate_id' => 1,
                    'user_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-4.jpg',
                    'title' => 'What is Cyber Security? A Beginner’s Guide',
                    'description' => 'Lorem ipsum dolor sit amet, accu msan in, tempor dictum nequrem ipsum...',
                    'content' => $contentHtml,
                    'blog_cate_id' => 2,
                    'user_id' => 11,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-5.jpg',
                    'title' => 'What is machine learning and how does it work?',
                    'description' => 'Lorem ipsum dolor sit amet, accu msan in, tempor dictum nequrem ipsum...',
                    'content' => $contentHtml,
                    'blog_cate_id' => 3,
                    'user_id' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-6.jpg',
                    'title' => 'How to become WebDesinger?',
                    'description' => 'Vero expedita voluptatibus cumque sunt ullam cum natus, vitae provident debitis pariatur?',
                    'content' => $contentHtml,
                    'blog_cate_id' => 2,
                    'user_id' => 13,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'poster' => 'blogpost-2.jpg',
                    'title' => 'Developing Agile Leadership',
                    'description' => 'Debitis ipsam ratione molestias dolores qui asperiores consequatur facilis error.',
                    'content' => $contentHtml,
                    'blog_cate_id' => 4,
                    'user_id' => 13,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
