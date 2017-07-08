<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>

    <meta charset="utf-8">
    <title>Stock Predictor</title>
    <meta name="description" content="Stock Predictor">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <script src="js/jquery-2.2.3.min.js"></script>

</head>

<style>
    body {
        padding-top: 40px;
    }

</style>

<body data-spy="scroll" data-target="#my-navbar">


    <!-- Navbar -->

    <div id="tabs">
        <?php 
            include_once "tabs.php";
        ?>
    </div>

    <!-- Faq -->

    <div class="container">
        <section>
            <div class="page-header" id="faq">
                <h2>Frequenty Asked Questions</h2>
            </div>
            <!-- End Page Header -->

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion">
                  Why Invest In The Stock Market?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-1" class="panel-collapse collapse" style={text-align:justify;}>
                            <div class="panel-body">
                                Investing in the stock market is important for people that wish to build a healthy financial future.The main reason for investing in stocks is to make money.There are many ways you can invest but the stock market usually offers the highest returns. Some people keep money in the bank making little to no interest, while safe, when inflation is factored in, these individuals are actually losing money. Assume you make 1% a year in the bank, if that. Then factor in 3% inflation a year. The safe investor is actually losing 2% per year.Investing in the stock market can make returns in excess of 10% a year, though it does carry risk. Anyone looking to invest in the stock market needs to understand that risk.

                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-2" data-toggle="collapse" data-parent="#accordion">
                  Where do I find Stock related information?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                Some of the most accessible avenues to get stock information are the internet, business news channels and print media. You could alternatively access the Kotak Securities website and get all the information that you wanted within a matter of seconds.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-3" data-toggle="collapse" data-parent="#accordion">
                  How do I start using technical analysis?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                Technical analysis is a method of analyzing securities by evaluating current and historical price and/or volume activity. Technical analysts use this information to predict future price movements and to identify high-probability trade entry and exit levels. Technical indicators are mathematical calculations based on price and/or volume activity that can be applied to any price to visually display the calculations' results, providing investors and traders with a dynamic view of the markets. Some indicators typically appear directly over the price chart, while other are displayed below. Multiple indicators can be used on one price chart. Nevertheless, too many indicators, or the use of similar indicators, can lead to confusion and unreliable signals.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-4" data-toggle="collapse" data-parent="#accordion">
                  Can I trade when markets are shut?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-4" class="panel-collapse collapse">
                            <div class="panel-body">
                                No, you cannot trade when the markets are shut but you can place orders . Such orders are called After-Market Orders. AMO is for those customers who are busy during market hours but wish to participate. When you place an AMO, you have to keep in mind the closing price of the stock. You can choose a price which is 5% higher or lower than the closing price. That said, your order will be processed as soon as the market opens the next day at the opening price if it falls within this 5% band. AMOs come handy when you need time to plan your orders after conducting research. During market hours, you need to actively track the price as it is constantly fluctuating. This is not the case for AMOs.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-5" data-toggle="collapse" data-parent="#accordion">
                  What are Bid and Ask prices?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-5" class="panel-collapse collapse">
                            <div class="panel-body">
                                When you want to buy or sell a stock, there is not one giant body that will buy or sell at a given price; there are millions of other people that are also looking to buy and sell, and an agreement must be reached. The “bid” and “ask” prices are the differences between the people who currently want to buy “bidders” and people who want to sell “askers”.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-6" data-toggle="collapse" data-parent="#accordion">
                  What mathematics is involved in stock price prediction?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-6" class="panel-collapse collapse">
                            <div class="panel-body">
                                Accurate stock price prediction is of utmost important to a plethora of investment firms and individuals. There has been constant research and development of new methodologies to do this. While predicting the exact price may be nearly impossible, predictions can get close enough to it. A number of methods are employed for this prediction, as listed here. We use Bayesian curve fitting, Neural Networks, SVM and MACD to do our predictions.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-7" data-toggle="collapse" data-parent="#accordion">
                  What is a decent return for non-professional investors?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-7" class="panel-collapse collapse">
                            <div class="panel-body">
                                Over the past 100 years, the stock market has realized close to an average 10% rate of return. Adjusted for inflation, that means stocks could potentially double the value of your money in just over ten years at their average long-term return rate. Keep in mind, however, that figure doesn't mean you are actually earning 10% per year on your money. Further, real expected rate of return is a topic that is frequently debated (and disagreed upon) among financial professionals. Conservatively, you might assume an expected rate of return closer to the 7-8% range.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-8" data-toggle="collapse" data-parent="#accordion">
                  I always hear about investors shorting a stock. What does that mean?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-8" class="panel-collapse collapse">
                            <div class="panel-body">
                                Investors short stocks when the stock's current trading price is thought to be overvalued. In the shorting process, the investor essentially "borrows" the stock from a brokerage house and sells to another buyer. To short a stock, you must trade through a broker using a margin account, which lends you more money to trade than you actually have in the account, at a fixed interest rate. Shorting stocks is an aggressive investment strategy; you must replace the lost money in the margin account quickly if your bet proves incorrect. On the contrary, "longing a stock" means buying and holding a stock for an undetermined amount of time.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-9" data-toggle="collapse" data-parent="#accordion">
                  What is high frequency trading?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-9" class="panel-collapse collapse">
                            <div class="panel-body">
                                High frequency trading is an automated trading platform used by large investment banks, hedge funds and institutional investors which utilizes powerful computers to transact a large number of orders at extremely high speeds. These high frequency trading platforms allow traders to execute millions of orders and scan multiple markets and exchanges in a matter of seconds, thus giving the institutions that use the platforms a huge advantage in the open market. The systems use complex algorithms to analyze the markets and are able to spot emerging trends in a fraction of a second.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-10" data-toggle="collapse" data-parent="#accordion">
                  What Is The Difference Between Swing Trading and Day Trading?
                </a>
                        </div>
                        <!-- End panel title -->
                        <div id="collapse-10" class="panel-collapse collapse">
                            <div class="panel-body">
                                Swing trading, day trading and investing are different in two major ways. First, the length of time a position is held varies greatly. An investor closes their eyes, buys a stock, commodity or currency and hopes for the best in the long term. Investors will often hold for years if not longer. A swing trader holds for days or weeks and a day trader holds for seconds or minutes. The second main difference is finding the level to buy or short. An investor usually chases the hot sector or hype, buying the highs and selling the lows in panic. A swing trader will look at the chart and find an appropriate level to go long or short. The level is usually technically based and will result in quick profits in weeks if not days as the stock bounces off resistance or support. A day trader does the same thing as a swing trader but on a micro time frame, usually holding for seconds or minutes. Swing trading is the gateway to financial independence for those that work a full time job. It is the fastest growing style of trading as investors, sick of losing, look to take hold of their portfolios.
                            </div>
                        </div>
                        <!-- End Panel collapse -->
                    </div>
                </div>

            </div>
            <!-- End panel group -->

        </section>
    </div>
    <!-- End container -->

    <br>

    <!-- Footer -->

    <div id="footer">
        <?php 
        include_once  "footer.php";
        ?>
    </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>
