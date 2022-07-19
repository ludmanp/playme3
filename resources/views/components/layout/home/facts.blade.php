<div class='factsBlock'>
    <x-common.container>
        <x-common.contentBlock :thin="true">
            <x-slot name="header">
                <h3>Факты</h3>
            </x-slot>
            <x-slot name="content">
                <p>Нашей командой реализовано более 300+ крупнейших проектов. Мы пишем, делаем, организуем, проводим, оформляем и создаём продукт любой сложности
                    и в любых условиях!</p>
            </x-slot>
            <x-slot name="actions">
                <x-common.link :withImage="true" :uppercase="true">
                    <x-slot name="icon">
                        <x-icons.running></x-icons.running>
                    </x-slot>
                    Связаться
                </x-common.link>
            </x-slot>
        </x-common.contentBlock>
        <div class='factsBlock__carousel'>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >

            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >

            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >

            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >

            </x-layout.home.factLink>
        </div>
    </x-common.container>
</div>
