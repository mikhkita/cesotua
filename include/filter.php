<?
			$cnt = CIBlockElement::GetList(
			    array(),
			    array("IBLOCK_ID" => 1, "ACTIVE" => "Y"),
			    array(),
			    false,
			    array('ID', 'NAME')
			);
			$arText1 = array('проверенный', 'проверенных', 'проверенных');
			$arText2 = array('автомобиль', 'автомобиля', 'автомобилей');
			?>
			<h2 class="center"><?=$cnt;?> <?=declOfNum($cnt, $arText1)?> <?=declOfNum($cnt, $arText2)?> в наличии</h2>

			<?$arEnums = getEnumsUnique();?>
			<form action="/catalog/" method="POST" class="b-pickup-form b-pickup-form-main">
				<input type="hidden" name="sort" value="PRICE_ASC">
				<input type="hidden" name="filter-applied" value="Y">
				<div class="b-select-list clearfix">
					<div class="b-select">
						<label>Марка</label>
						<select name="mark">
							<option value=""></option>
							<?foreach ($arEnums["MARK"] as $key => $value):?>
								<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
							<?endforeach;?>
						</select>
					</div>
					<div class="b-select framework7-cont">
						<div class="b-input framework7-input">
							<input type="text" name="year" readonly>
							<label>Год выпуска</label>
						</div>
						<div class="b-select-div">
							<div class="b-select-div-name">Год выпуска</div>
							<div class="b-select-div-values hide">
								<span class="values-from-cont hide">от <span class="values-from"></span></span>
								<span class="values-to-cont hide"> до <span class="values-to"></span></span>
							</div>
						</div>
						<div class="b-select-drop-cont">
							<div class="b-select-drop">
								<div class="b-input b-select-drop-input">
									<input type="text" name="year-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="4">
								</div>
								<span class="drop-dash">-</span>
								<div class="b-input b-select-drop-input">
									<input type="text" name="year-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="4">
								</div>
								<span class="drop-value"> г.</span>
							</div>
						</div>
					</div>
					<div class="b-select mobile-filter framework7-cont">
						<div class="b-input framework7-input">
							<input type="text" name="capacity" readonly>
							<label>Мощность</label>
						</div>
						<div class="b-select-div">
							<div class="b-select-div-name">Мощность</div>
							<div class="b-select-div-values hide">
								<span class="values-from-cont hide">от <span class="values-from"></span></span>
								<span class="values-to-cont hide"> до <span class="values-to"></span></span>
							</div>
						</div>
						<div class="b-select-drop-cont">
							<div class="b-select-drop">
								<div class="b-input b-select-drop-input small">
									<input type="text" name="capacity-from" placeholder="от" class="input-number input-interval input-interval-from" maxlength="3">
								</div>
								<span class="drop-dash">-</span>
								<div class="b-input b-select-drop-input small">
									<input type="text" name="capacity-to" placeholder="до" class="input-number input-interval input-interval-to" maxlength="3">
								</div>
								<span class="drop-value"> л.с.</span>
							</div>
						</div>
					</div>
					<div class="b-select mobile-filter framework7-cont">
						<div class="b-input framework7-input">
							<input type="text" name="volume" readonly>
							<label>Объем</label>
						</div>
						<div class="b-select-div">
							<div class="b-select-div-name">Объем</div>
							<div class="b-select-div-values hide">
								<span class="values-from-cont hide">от <span class="values-from"></span></span>
								<span class="values-to-cont hide"> до <span class="values-to"></span></span>
							</div>
						</div>
						<div class="b-select-drop-cont">
							<div class="b-select-drop">
								<div class="b-input b-select-drop-input">
									<input type="text" name="volume-from" placeholder="от" class="input-number-volume input-interval input-interval-from" maxlength="5">
								</div>
								<span class="drop-dash">-</span>
								<div class="b-input b-select-drop-input">
									<input type="text" name="volume-to" placeholder="до" class="input-number-volume input-interval input-interval-to" maxlength="5">
								</div>
								<span class="drop-value"> л.</span>
							</div>
						</div>
					</div>
					<div class="b-select b-select-price">
						<div class="price-mobile-cont">
							<label>Стоимость</label>
							<input type="text" name="price-mobile-from" placeholder="Стоимость" class="price-mobile price-mobile-from">
							<span class="price-mobile-dash">-</span>
							<input type="text" name="price-mobile-to" placeholder="до" class="price-mobile price-mobile-to">
						</div>
						<div class="b-select-div">
							<div class="b-select-div-name">Цена</div>
							<div class="b-select-div-values hide">
								<span class="values-from-cont hide">от <span class="values-from"></span></span>
								<span class="values-to-cont hide"> до <span class="values-to"></span></span>
							</div>
						</div>
						<div class="b-select-drop-cont">
							<div class="b-select-drop">
								<div class="b-input b-select-drop-input-price">
									<span class="drop-from">от</span>
									<input type="text" name="price-from" class="input-number input-interval input-interval-from" placeholder="100000">
									<span class="drop-rub">руб.</span>
								</div>
								<div class="b-input b-select-drop-input-price">
									<span class="drop-from">до</span>
									<input type="text" name="price-to" class="input-number input-interval input-interval-to" placeholder="1000000">
									<span class="drop-rub">руб.</span>
								</div>
							</div>
						</div>
					</div>
					<div class="b-select mobile-filter">
						<label>КПП</label>
						<select name="transmission">
							<option value=""></option>
							<?foreach ($arEnums["TRANSMISSION"] as $key => $value):?>
								<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
							<?endforeach;?>
						</select>
					</div>
					<div class="b-select mobile-filter">
						<label>Привод</label>
						<select name="drive">
							<option value=""></option>
							<?foreach ($arEnums["DRIVE"] as $key => $value):?>
								<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
							<?endforeach;?>
						</select>
					</div>
					<div class="b-select mobile-filter">
						<label>Руль</label>
						<select name="rudder">
							<option value=""></option>
							<?foreach ($arEnums["RUDDER"] as $key => $value):?>
								<option value="<?=$key?>"><?=mb_ucfirst_custom($value)?></option>
							<?endforeach;?>
						</select>
					</div>
				</div>
				<div class="center b-pickup-form-bottom">
					<div class="pickup-right">
						<a href="#" class="b-btn-mobile-filter">
							<span class="filter-text-detail">Подробно</span>
							<span class="filter-text-turn hide">Свернуть</span>
						</a>
						<a href="#" class="b-btn-reset"><span class="icon-update"></span><span class="pickup-right-text">Сбросить фильтр</span></a>
					</div>
					<a href="#" class="b-btn b-btn-pickup b-btn-pickup-main"><span>Подобрать</span></a>
				</div>
			</form>