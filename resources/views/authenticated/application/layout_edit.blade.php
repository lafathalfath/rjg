<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') ?: 'Laravel' }} | Edit Layout</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

    <style>
        #canvas {
            background: white;
            width: 100%;
            height: 100%;
            overflow: scroll;
        }
        #sidebar {
            transition: width 0.3s, height 0.3s, overflow 0.3s;
        }
    </style>
</head>
<body class="w-[100dvw] h-[100dvh] overflow-hidden">

    <div class="relative w-full h-full overflow-hidden">
        
        <nav class="absolute top-0 left-0 w-[350px] h-[100dvh] p-2">
            <div class="bg-gray-500 w-full h-full p-2 overflow-scroll rounded-xl text-white" id="sidebar">
                <button class="text-xl font-bold px-3 py-1 cursor-pointer" onclick="toggleSidebar()">&#9776;</button>

                <div id="sidebar-content" class="mt-5">
                    <div>
                        <button class="w-full btn flex items-center justify-between" onclick="toggleSection(this)"><span>Header</span><span>&#11207;</span></button>
                        <div id="header-drawer" style="display: none;">
                            <div class="mt-2 mb-1">
                                <button class="px-2 cursor-pointer bg-gray-100 text-black rounded">+ new</button>
                            </div>
                            <div class="border">
                                <div class="cursor-default" onclick="toggleHideChild(this)">
                                    <div>lzklkzxcv</div>
                                    <div class="ms-3">child</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="w-full btn flex items-center justify-between" onclick="toggleSection(this)"><span>Footer</span><span>&#11207;</span></button>
                        <div id="footer-drawer" style="display: none;">
                            <div class="mt-2 mb-1">
                                <button class="px-2 cursor-pointer bg-gray-100 text-black rounded">+ new</button>
                            </div>
                            <div class="border">
                                <div>lzkmvclzcxmv</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="p-5 w-full h-full overflow-hidden bg-gray-200">
            <div id="canvas">
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        const load = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            const headerDrawer = document.getElementById('header-drawer')
            const footerDrawer = document.getElementById('footer-drawer')
            sidebar.style.cssText = sessionStorage.getItem('sidebar')
            sidebarContent.style.cssText = sessionStorage.getItem('sidebar-content')
            headerDrawer.style.cssText = sessionStorage.getItem('header-drawer')
            footerDrawer.style.cssText = sessionStorage.getItem('footer-drawer')

            const headerToggleChevron = headerDrawer.parentElement.children[0].children[1]
            const footerToggleChevron = footerDrawer.parentElement.children[0].children[1]
            headerToggleChevron.innerHTML = headerDrawer.style.display == 'none' ? '&#11207;' : '&#11206;'
            footerToggleChevron.innerHTML = footerDrawer.style.display == 'none' ? '&#11207;' : '&#11206;'
        }
        
        const save = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            const headerDrawer = document.getElementById('header-drawer')
            const footerDrawer = document.getElementById('footer-drawer')
            sessionStorage.setItem('sidebar', sidebar.style.cssText)
            sessionStorage.setItem('sidebar-content', sidebarContent.style.cssText)
            sessionStorage.setItem('header-drawer', headerDrawer.style.cssText)
            sessionStorage.setItem('footer-drawer', footerDrawer.style.cssText)
        }

        const toggleSidebar = () => {
            const sidebar = document.getElementById('sidebar')
            const sidebarContent = document.getElementById('sidebar-content')
            if (sidebarContent.style.display == '') {
                sidebar.style.width = '58px'
                sidebar.style.height = '52px'
                sidebar.style.overflow = 'hidden'
            } else {
                sidebar.style.width = '100%'
                sidebar.style.height = '100%'
                sidebar.style.overflow = 'scroll'
            }
            sidebarContent.style.display = sidebarContent.style.display == 'none' ? '' : 'none'
            save()
        }

        const toggleSection = (e) => {
            const drawer = e.parentElement.children[1]
            if (drawer) {
                e.children[1].innerHTML = drawer.style.display == 'none' ? '&#11206;' : '&#11207;'
                drawer.style.display = drawer.style.display == 'none' ? '' : 'none'
            }
            save()
        }

        const toggleHideChild = (e) => {
            const child = e.children[1]
            child.style.display = child.style.display == 'none' ? '' : 'none'
        }

        load()
    </script>
</body>
</html>