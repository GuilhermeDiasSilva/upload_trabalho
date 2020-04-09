<?php

	function LoadImg($imagem,$nome,$pastaFotos) {
		
		list($largura1, $altura1) = getimagesize($imagem);

		$largura = 800;
		$percent = ($largura/$largura1);
		$altura = $altura1 * $percent;

		$larguram = 640;
		$percentm = ($larguram/$largura1);
		$alturam = $altura1 * $percentm;

		$largurap = 250;
		$percentp = ($largurap/$largura1);
		$alturap = $altura1 * $percentp;

		$imagem_gerada = $pastaFotos.$nome."g.jpg";
		$path = $imagem;
		$imagem_orig = ImageCreateFromJPEG($path);
		$pontoX = ImagesX($imagem_orig);
		$pontoY = ImagesY($imagem_orig);
		$imagem_fin = ImageCreateTrueColor($largura, $altura);
		ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0, $largura+1, $altura+1, $pontoX, $pontoY);
		ImageJPEG($imagem_fin, $imagem_gerada,80);
		ImageDestroy($imagem_orig);
		ImageDestroy($imagem_fin); 

		$imagem_gerada = $pastaFotos.$nome."m.jpg";
		$path = $imagem;
		$imagem_orig = ImageCreateFromJPEG($path);
		$pontoX = ImagesX($imagem_orig);
		$pontoY = ImagesY($imagem_orig);
		$imagem_fin = ImageCreateTrueColor($larguram, $alturam);
		ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0, $larguram+1, $alturam+1, $pontoX, $pontoY);
		ImageJPEG($imagem_fin, $imagem_gerada,70);
		ImageDestroy($imagem_orig);
		ImageDestroy($imagem_fin);

		$imagem_gerada = $pastaFotos.$nome."p.jpg";
		$path = $imagem;
		$imagem_orig = ImageCreateFromJPEG($path);
		$pontoX = ImagesX($imagem_orig);
		$pontoY = ImagesY($imagem_orig);
		$imagem_fin = ImageCreateTrueColor($largurap, $alturap);
		ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0, $largurap+1, $alturap+1, $pontoX, $pontoY);
		ImageJPEG($imagem_fin, $imagem_gerada,70);
		ImageDestroy($imagem_orig);
		ImageDestroy($imagem_fin);
		
	
		//apagar a imagem antiga
		unlink ($imagem);
		//rename($imagem, $pastaFotos.$cod."g.jpg");
	}

	