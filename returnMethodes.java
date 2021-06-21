package bsa4.sa19b501.WeatherAPIsoap;

import java.util.Random;

public class returnMethodes {

	public String tempNow() {
		Random rand = new Random();
		float randomTemp = rand.nextFloat() + rand.nextInt(50); // bis 50°C
		return String.valueOf(randomTemp);
	}

	public String windDirNow() {
		Random rand = new Random();
		String array[] = { "N", "NO", "O", "OS", "S", "SW", "W", "NW" };
		return array[rand.nextInt(8)];
	}

	public String windSpeedNow() {
		Random rand = new Random();
		float randomTemp = rand.nextFloat() + rand.nextInt(100); // bis 100km/h
		return String.valueOf(randomTemp);
	}

	public String[] weatherDatasetNow() {
		String[] tmp = new String[3];
		tmp[0] = "Temp:" + tempNow();
		tmp[1] = "windDir:" + windDirNow();
		tmp[2] = "windSpeed:" + windSpeedNow();
		return tmp;
	}

	public String[] weatherDatasetWeek() {
		String[] tmp = new String[3 * 7];
		for (int i = 0; i < 3 * 7; i = i + 3) {
			tmp[i] = "temp:" + tempNow();
			tmp[i + 1] = "windDir:" + windDirNow();
			tmp[i + 2] = "windSpeed:" + windSpeedNow();
		}
		return tmp;
	}
}