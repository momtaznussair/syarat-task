<!DOCTYPE html>
<html lang="en">
	
    <x-layouts.head :title="$title ?? ''">
		{{ $pageStyles ?? '' }}
	</x-layouts.head> 

	{{-- begin::Body --}}
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">

        {{-- begin::Main --}}
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">

				<x-layouts.aside-menu />

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    				<x-layouts.header />

                    <x-layouts.breadcrumb />

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div id="kt_content_container" class="container-xxl">
							{{ $slot }}
						</div>
					</div>
					<!--end::Content-->

                    <x-layouts.footer />
				</div>
			</div>
		</div>
		{{-- end::Main --}}

		{{-- begin::Scrolltop --}}
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		{{-- end::Scrolltop --}}

        <x-layouts.scripts>
			{{ $pageScripts ?? '' }}
		</x-layouts.scripts>


	</body>
	{{-- end::Body --}}
</html>