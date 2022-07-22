<div class='blogBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>блог</h3>
            </x-slot>
        </x-common.contentBlock>
        <div class='blogBlock__carousel'>
            <x-layout.home.blogCard :carouselId="'test'" :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
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
                        #ВидеосъёмкаМерроприятий
                    </x-common.link>
                    <x-common.link :tag="true">
                        #Видеосъёмка
                    </x-common.link>
                    <x-common.link :tag="true">
                        #Мерроприятия
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
            <x-layout.home.blogCard :carouselId="'test2'" :image="'../img/home/blog/blog.jpg'" :imageAlt="'blog-img'" :author="'ФИ автора'" :date="'01.01.2021'"
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
        </div>
    </x-common.container>
</div>
