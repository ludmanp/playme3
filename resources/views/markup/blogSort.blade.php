@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='blog__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>блог</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>стримы</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    <x-common.link href='#' class='active' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">стримы</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">съемка</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">Создание видео</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">ПРЯМОЙ ЭФИР</span>
                    </x-common.link>
                </x-common.tabNav>
                <div class='blog__cards'>
                    <x-layout.blog.cardsFull>
                        <x-layout.home.blogCard :carousel-id="'test'" :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus. Magnis et ultrices donec nunc.
                                Maecenas sollicitudin pulvinar at elementum scelerisque purus, elit.
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #ВидеосъёмкаМерроприятий
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>

                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                    </x-layout.blog.cardsFull>
                    <x-layout.blog.cardsOneAndHalf>
                        <x-layout.home.blogCard :carousel-id="'test-1'" :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus. Magnis et ultrices donec nunc.
                                Maecenas sollicitudin pulvinar at elementum scelerisque purus, elit.
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #ВидеосъёмкаМерроприятий
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                        <x-layout.home.blogCard :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus. Magnis et ultrices donec nunc.
                                Maecenas sollicitudin pulvinar at elementum scelerisque purus, elit.
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #ВидеосъёмкаМерроприятий
                                </x-common.link>
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                    </x-layout.blog.cardsOneAndHalf>

                    <x-layout.blog.cardsThree>
                        <x-layout.home.blogCard :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                        <x-layout.home.blogCard :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                        <x-layout.home.blogCard :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
                                                :authorImage="'../img/home/blog/author.jpg'" :authorImageAlt="'author-image'" :header="'заголовок'">
                            <x-slot name="text">
                                Quis fermentum venenatis, sagittis, fermentum ut commodo tincidunt. Sollicitudin et sed morbi nunc maecenas.
                                Purus nam ipsum amet nunc enim aenean. Sem fermentum etiam orci eros metus
                            </x-slot>
                            <x-slot name="tags">
                                <x-common.link :tag="true">
                                    #Видео
                                </x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Читать
                                </x-common.link>
                            </x-slot>
                        </x-layout.home.blogCard>
                    </x-layout.blog.cardsThree>

                    <div class='blog__cardsAction'>
                        <x-common.button :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            Показать еще
                        </x-common.button>
                    </div>
                </div>
            </x-common.contentContainer>
        </div>
    </x-common.container>
@endsection


